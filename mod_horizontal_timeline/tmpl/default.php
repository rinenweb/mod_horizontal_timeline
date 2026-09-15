<?php
// Prevent direct access
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$moduleId = (int) $module->id;

// Build the list of "below timeline" descriptions, keyed by item index
$descriptions = [];

foreach ((array) $timelineItems as $index => $item) {
    $descriptions[$index] = $item->options->below_text ?? '';
}

$numberOfColumns = count((array) $timelineItems);
?>
<style>
  #mod-htl-<?php echo $moduleId; ?> { --colNum: <?php echo $numberOfColumns; ?>; }
</style>

<div id="mod-htl-<?php echo $moduleId; ?>" class="mod-horizontal-timeline">
<?php if (!empty($aboveText)) : ?>
  <div class="timeline-above">
    <?php echo $aboveText; ?>
  </div>
<?php endif; ?>

<?php if (!empty($timelineItems)) : ?>
  <div class="timelinebody">
    <div class="moa-roadmap-group">
      <?php foreach ($timelineItems as $index => $item) : ?>
        <div class="moa-roadmap-wrapper"
             id="moa-roadmap-wrapper-<?php echo $moduleId; ?>-<?php echo htmlspecialchars((string) $index, ENT_QUOTES, 'UTF-8'); ?>"
             data-index="<?php echo htmlspecialchars((string) $index, ENT_QUOTES, 'UTF-8'); ?>">
          <div class="moa-roadmap-card">
            <div class="moa-roadmap-card-title"><?php echo $item->options->above_dot_text ?? ''; ?></div>
          </div>
          <div class="moa-roadmap-card-footer">
            <span class="moa-roadmap-card-year"><?php echo htmlspecialchars($item->options->year ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Area for showing the text below the timeline dynamically -->
  <div class="moa-roadmap-details">
    <?php foreach ($descriptions as $index => $below) : ?>
      <div class="moa-roadmap-details-content-hidden"
           data-index="<?php echo htmlspecialchars((string) $index, ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo $below; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php else : ?>
  <p><?php echo Text::_('MOD_HORIZONTAL_TIMELINE_NO_ITEMS'); ?></p>
<?php endif; ?>
</div>
