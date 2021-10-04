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

use Joomla\CMS\Factory;
use Joomla\Filter\OutputFilter;

class ModTncArticleHelper
{
	/**
	 * Get the article contents
	 * for display
	 *
	 * @param $article_id int
	 *
	 * @return object
	 */
	public function getDisplay($article_id)
	{
		$tnc = new stdClass();

		if(!empty($article_id)) {
			$item = $this->getArticle($article_id);
			if (!$item->id)
			{
				return $tnc;
			}
			$tnc->title = OutputFilter::ampReplace($item->title);
			$tnc->introtext = $item->introtext;
			$tnc->fulltext = $item->fulltext;
			return $tnc;
		}

		return $tnc;
	}


	/**
	 * Get the article contents
	 * id, title, introtext and fulltext
	 *
	 * @param $id int
	 * @return object
	 */
	private function getArticle($id) {

		$db = Factory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__content'));
		$query->where($db->quoteName('id') . ' = '. (int)$id);
		$db->setQuery($query);
		return $db->loadObject();

	}

}