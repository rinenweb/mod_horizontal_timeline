function showmessage(id) {

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

  // set below text
  var dataContainer = document.getElementById("moa-roadmap-wrapper-" + id);
  var userData = JSON.parse(dataContainer.dataset.event);
  var timelineDetailsContent = document.getElementById('moa-roadmap-details-content');
  timelineDetailsContent.innerHTML = userData.below_text;
}