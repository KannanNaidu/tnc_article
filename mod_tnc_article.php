<?php
/**
 * @package    tnc_article
 *
 * @version    1.0.0
 * @author     Kannan Naidu Venugopal <kannan.naidu@kannannaidu.my>
 * @copyright  Copyright (c) 2008 - 2021 Kannan Naidu Venugopal. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.kannannaidu.my
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

// Register class
JLoader::register('ModTncArticleHelper', __DIR__ . '/helper.php');

// Get the services data
$article = (new ModTncArticleHelper)->getDisplay($params->get('article_id'));

// The below line is no longer used in Joomla 4
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require ModuleHelper::getLayoutPath('mod_tnc_article', $params->get('layout', 'default'));
