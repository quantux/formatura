<?php
/**
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

$controller = JControllerLegacy::getInstance("GoogleMaps");

$controller->execute(JFactory::getApplication()->input->get('task'));

$controller->redirect();