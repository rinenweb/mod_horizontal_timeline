<?php
/**
 * @package     Rinenweb.Module
 * @subpackage  mod_horizontal_timeline
 * @author      Rinenweb <info@rinenweb.eu>
 * @link        https://www.rinenweb.eu
 * @license     GNU General Public License version 2 or later
 */

// Prevent direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;

/** @var \Joomla\CMS\Application\CMSApplicationInterface $app */
$app = Factory::getApplication();
$wa  = $app->getDocument()->getWebAssetManager();

// Load the module parameters
$aboveText     = $params->get('above_text', '');
$timelineItems = $params->get('timeline_items', []);

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

require ModuleHelper::getLayoutPath('mod_horizontal_timeline');
