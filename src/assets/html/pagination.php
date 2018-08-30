<?php
/**
 * @copyright	Copyright (C) 2008 - 2009  All rights reserved.
 * @license
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
function pagination_list_footer($list)
{
	$html = "<div class=\"list-footer\">\n";
	$html .= "\n<div class=\"limit\">".JText::_('Display Num').$list['limitfield']."</div>";
	$html .= $list['pageslinks'];
	$html .= "\n<input type=\"hidden\" name=\"limitstart\" value=\"".$list['limitstart']."\" />";
	$html .= "\n</div>";
	return $html;
}
function pagination_list_render($list)
{
	// Initialize variables
	$html = "<span class=\"pagination__list\">";
	$html .= '<span>&laquo;</span>'.$list['start']['data'];
	$html .= $list['previous']['data'];
	foreach( $list['pages'] as $page )
	{
		$html .= $page['data'];
	}
	$html .= $list['next']['data'];
	$html .= $list['end']['data'];
	$html .= '<span>&raquo;</span>';
	$html .= "</span>";
	return $html;
}
function pagination_item_active(&$item) {
	return "<a href=\"".$item->link."\" title=\"".$item->text."\">".$item->text."</a>";
}
function pagination_item_inactive(&$item) {
	return "<span>".$item->text."</span>";
}
?>