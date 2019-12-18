<?php
/*---------------------------------------------------------------
# Package - Joomla Template based on Stools Framework   
# ---------------------------------------------------------------
# Author - joomla2you http://www.joomla2you.com
# Copyright (C) 2008 - 2017 joomla2you.com. All Rights Reserved.
# Websites: http://www.joomla2you.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
?>

<?php
	if ($this->isIE(8)) $this->addCSS('IE8_only.css');
	if ($this->isIE(9)) $this->addCSS('IE9_only.css');
?>