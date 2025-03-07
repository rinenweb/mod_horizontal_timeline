function showmessage(id, numberOfElements) {

  // set title active
  const items = document.getElementsByClassName('moa-roadmap-card-title');
  for (let index = 0; index < items.length; index++)
    items[index].classList.remove("active");
  var dataContainer = document.getElementById("moa-roadmap-card-title-" + id);
  dataContainer.classList.add('active');

  // set year active
  const items2 = document.getElementsByClassName('moa-roadmap-card-year');
  for (let index = 0; index < items2.length; index++)
    items2[index].classList.remove("active");
  var dataContainer = document.getElementById("moa-roadmap-card-year-" + id);
  dataContainer.classList.add('active');

  const items3 = document.getElementsByClassName('moa-roadmap-card-footer');
  for (let index = 0; index < items3.length; index++)
    items3[index].classList.remove("active");
  document.getElementById("moa-roadmap-card-footer-" + id).classList.add('active');
  
  //NEW APPOACH
   for (var i=0;i < numberOfElements;i++) {     
      var extractedId = id.replace('timeline_items', '');
      if (i.toString() === extractedId.toString()) {
        const moaRoadmapDetailsContent = document.getElementById('moa-roadmap-details-content-timeline_items' + i.toString());
        moaRoadmapDetailsContent.classList.remove('moa-roadmap-details-content-hidden');
        moaRoadmapDetailsContent.classList.add('moa-roadmap-details-content-visible');
      }
      else 
      {
        const moaRoadmapDetailsContent = document.getElementById('moa-roadmap-details-content-timeline_items' + i.toString());
        moaRoadmapDetailsContent.classList.remove('moa-roadmap-details-content-visible');
        moaRoadmapDetailsContent.classList.add('moa-roadmap-details-content-hidden');
      }
   }

  //OLD APPROACH
  //var userData = JSON.parse(document.getElementById("moa-roadmap-wrapper-" + id).dataset.event);
  //document.getElementById('moa-roadmap-details-content').innerHTML = modifyHrefInHtmlString(userData);  
}

function modifyHrefInHtmlString(htmlString) {
  //Create a temporary DOM element
  var tempDiv = document.createElement("div");
  tempDiv.innerHTML = htmlString;

  // Select all anchor elements
  var links = tempDiv.querySelectorAll("a");

  // Iterate through the links and modify the href attributes
  links.forEach(function (link) {
    if (urlHasOptionContent(link.href) === true)
      link.href = extractContent(link.href);    
  });

  return tempDiv.innerHTML;
}

function urlHasOptionContent(url) {
  var ret = false;
  var params = new URLSearchParams(url.split('?')[1]);
  if (params.get('option') === 'com_content') // Get the 'id' parameter
    ret = true;

  return ret;
}

function extractContent(url) {
  var params = new URLSearchParams(url.split('?')[1]);
  var idParam = params.get('id');
  var catIdParam = params.get('catid');
  var extractedText = '/' + catIdParam.split(':')[1] + '/' + idParam.split(':')[1];
  return extractedText;
}

//TAGS example
//index.php?option=com_tags&view=tag&id=3:diavouleusi-se-exelixi&Itemid=130

function urlHasOptionTag(url) {
  var ret = false;
  var params = new URLSearchParams(url.split('?')[1]);
  if (params.get('option') === 'com_tags') // Get the 'id' parameter
    ret = true;

  return ret;
}

function extractTag(url) {
  return '<?php echo ' + url + '); ?>';
  //   console.log(result);

  // var params = new URLSearchParams(url.split('?')[1]);  
  // return '/' + params.get('id').split(':')[1];
}

function processString(inputString) {
  fetch('process_string.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'inputString=' + encodeURIComponent(inputString)
  })
    .then(response => response.json())
    .then(data => {
      if (data.result) {
        return data.result;
        //console.log('Processed string:', data.result);
      } else {
        console.error('Error:', data.error);
      }
    })
    .catch(error => console.error('Error:', error));
}