<?php
// Prevent direct access
defined('_JEXEC') or die;
$document = JFactory::getDocument();
$document->addScript(JURI::base() . 'modules/mod_horizontal_timeline/tmpl/script.js');
//$document->addScript('./tmpl/sample.js');
// Get the timeline items from module parameters
//$timelineItems = $params->get('timeline_items', []);
//echo "#" . gettype($timelineItems);
// Check if there are timeline items
$numberOfColumns = count((array)$timelineItems);
?>

<link rel="stylesheet" href="style.css">
<style>
  :root {
    --colNum: <?=$numberOfColumns?>;    
  }
</style>

<?php if (!empty($aboveText)) : ?>
    <div class="timeline-above">
        <?php echo $aboveText; ?>
    </div>
<?php endif; ?>

<?php if (!empty($timelineItems)): ?>
	<div class="timelinebody">
		<div class="moa-roadmap-group">
			<?php foreach ($timelineItems as $index => $item): ?>
			  <?php $jsonData = htmlspecialchars(json_encode($item->options), ENT_QUOTES, 'UTF-8');?>
				<div class="moa-roadmap-wrapper" id='<?php echo "moa-roadmap-wrapper-".$index ?>' data-event="<?php echo $jsonData ?>" onclick="showmessage('<?php echo $index?>')">
				  <div class="moa-roadmap-card" id='<?php echo "moa-roadmap-card-".$index ?>'>                    
            <div class="moa-roadmap-card-title" id='<?php echo "moa-roadmap-card-title-".$index ?>'><?php echo $item->options->above_dot_text ?></div>
				  </div>
          <div class="moa-roadmap-card-footer" id='<?php echo "moa-roadmap-card-footer-".$index ?>'>
            <span class="moa-roadmap-card-year" id='<?php echo "moa-roadmap-card-year-".$index ?>'><?php echo $item->options->year ?></span>
          </div>
				</div>				
			<?php endforeach; ?>
		</div>
	</div>
	<!-- Area for showing Text Below Timeline dynamically -->
    <div class="moa-roadmap-details">
        <div id="moa-roadmap-details-content"></div>
    </div>

<?php else: ?>
	<p>No timeline items found. Please configure the module settings.</p>
<?php endif; ?>