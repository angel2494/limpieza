<?php
/*---------------------------------------------------------------
# Package - Stools Framework  
# ---------------------------------------------------------------
# Author - joomla2you http://www.joomla2you.com
# Copyright (C) 2008 - 2017 joomla2you.com. All Rights Reserved. 
# Websites: http://www.joomla2you.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
if ($this->getParam('showcp')) {
echo JText::_('JU') . ' &copy; ' . $this->getParam('copyright'); 
}
echo '<span class="designed_by">designed by <a target="_blank" title="joomla2you" href="http://www.joomla2you.com">joomla2you</a><br /></span>';
