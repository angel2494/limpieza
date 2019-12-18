<?php
/*---------------------------------------------------------------
# Package - Stools Framework  
# ---------------------------------------------------------------
# Author - joomla2you http://www.joomla2you.com
# Copyright (C) 2008 - 2017 joomla2you.com. All Rights Reserved. 
# Websites: http://www.joomla2you.com
-----------------------------------------------------------------*/
defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');
class JFormFieldLine extends JFormField {
	protected $type = 'Line';
	protected function getInput() {
		$text  	= (string) $this->element['text'];
		return '<div class="line_separator'.(($text != '') ? ' hasText' : '').'" title="'. JText::_($this->element['desc']) .'"><span>' . JText::_($text) . '</span></div>';
	}
}