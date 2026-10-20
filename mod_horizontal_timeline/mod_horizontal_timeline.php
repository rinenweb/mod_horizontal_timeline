<?php
/**
 * @license     GNU General Public License version 3 or later; see LICENSE
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;

$app = Factory::getApplication();
$wa  = $app->getDocument()->getWebAssetManager();

// Load the module parameters
$aboveText = $params->get('above_text', '');

// Normalise the subform value to an array of item objects. An empty object or an
// empty string must count as "no items", which empty() alone does not guarantee.
$timelineItems = array_filter((array) $params->get('timeline_items', []), 'is_object');

// Register and load the assets once, via the Web Asset Manager
$wa->registerAndUseStyle(
    'mod_horizontal_timeline',
    'modules/mod_horizontal_timeline/tmpl/style.css'
);
$wa->registerAndUseScript(
    'mod_horizontal_timeline',
    'modules/mod_horizontal_timeline/tmpl/script.js',
    [],
    ['defer' => true]
);

require ModuleHelper::getLayoutPath('mod_horizontal_timeline', $params->get('layout', 'default'));
