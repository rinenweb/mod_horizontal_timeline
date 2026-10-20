<?php
/**
 * @license     GNU General Public License version 3 or later; see LICENSE
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$moduleId = (int) $module->id;
$htlId    = 'mod-htl-' . $moduleId;

// Per-instance column count, added through the Web Asset Manager so Joomla's
// HTTP Headers plugin can nonce it under a strict Content-Security-Policy.
$wa->addInlineStyle('#' . $htlId . ' { --colNum: ' . count($timelineItems) . '; }');
?>
<div id="<?php echo $htlId; ?>" class="mod-horizontal-timeline">
<?php if (!empty($aboveText)) : ?>
  <div class="timeline-above">
    <?php echo $aboveText; ?>
  </div>
<?php endif; ?>

<?php if (!empty($timelineItems)) : ?>
  <div class="timelinebody">
    <div class="moa-roadmap-group">
      <?php foreach ($timelineItems as $index => $item) :
          $key = htmlspecialchars((string) $index, ENT_QUOTES, 'UTF-8'); ?>
        <div class="moa-roadmap-wrapper"
             id="moa-roadmap-wrapper-<?php echo $moduleId; ?>-<?php echo $key; ?>"
             data-index="<?php echo $key; ?>"
             role="button"
             tabindex="0"
             aria-expanded="false"
             aria-controls="<?php echo $htlId; ?>-details-<?php echo $key; ?>">
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
    <?php foreach ($timelineItems as $index => $item) :
        $key = htmlspecialchars((string) $index, ENT_QUOTES, 'UTF-8'); ?>
      <div class="moa-roadmap-details-content-hidden"
           id="<?php echo $htlId; ?>-details-<?php echo $key; ?>"
           data-index="<?php echo $key; ?>">
        <?php echo $item->options->below_text ?? ''; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php else : ?>
  <p><?php echo Text::_('MOD_HORIZONTAL_TIMELINE_NO_ITEMS'); ?></p>
<?php endif; ?>
</div>
