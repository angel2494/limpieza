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

if ($this->countModules ( 'left or left1 or left2 or left-mid or left3 or left4 or left-bottom' )) {
define('_LEFT', 1);
?>
<div id="ju-leftcol" class="clearfix">
<?php 
$this->addModules('left','ju_xhtml');//position left
$this->addModules('left1,left2','ju_xhtml','ju-left-gridtop');//position left1 and left2
$this->addModules('left-mid','ju_xhtml');//position left-mid
$this->addModules('left3,left4','ju_xhtml','ju-left-gridbottom');//position left3 and left4	
$this->addModules('left-bottom','ju_xhtml');//position left-bottom 			
?>
</div>
<?php
}