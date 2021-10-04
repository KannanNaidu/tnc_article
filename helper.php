<?php
/**
 * @package    tnc_article
 *
 * @version    1.1.0
 * @author     Kannan Naidu Venugopal <kannan.naidu@kannannaidu.my>
 * @copyright  Copyright (c) 2008 - 2021 Kannan Naidu Venugopal. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.kannannaidu.my
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\Filter\OutputFilter;

class ModTncArticleHelper
{

	/**
	 * Get the article contents
	 * id, title, introtext and fulltext
	 *
	 * @param $article_id int
	 * @return object
	 */
	public static function getArticle($article_id) {

		$tnc = new stdClass();

		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__content'));
		$query->where($db->quoteName('id') . ' = '. (int)$id);
		$db->setQuery($query);
		$item = $db->loadObject();

		$tnc->title = OutputFilter::ampReplace($item->title);
		$tnc->introtext = $item->introtext;
		$tnc->fulltext = $item->fulltext;

		return $tnc;

	}

}