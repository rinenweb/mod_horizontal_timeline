<?php
// Prevent direct access
defined('_JEXEC') or die;

// Load the module parameters
$moduleId = $module->id;
$aboveText = $params->get('above_text', '');
$timelineItems = $params->get('timeline_items', []);
$document = JFactory::getDocument();

// Add CSS
$document->addStyleSheet('modules/mod_horizontal_timeline/tmpl/style.css');

require JModuleHelper::getLayoutPath('mod_horizontal_timeline');
?>