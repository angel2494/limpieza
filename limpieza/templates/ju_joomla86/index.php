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
require_once(dirname(__FILE__).'/lib/frame.php');
$jversion = new JVersion;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language;?>" >
<head>
<?php
$stools->loadHead();
$stools->addCSS('template.css,joomla.css,menu.css,override.css,modules.css');
if ($stools->isRTL()) $stools->addCSS('template_rtl.css');
?>
</head>
<?php $stools->addFeatures('ie6warn'); ?>
<body class="bg <?php echo $stools->direction . ' ' . $stools->style ?> clearfix">

<div id="ju-top-header" class="clearfix" >
<div class="ju-base">
<?php 
$stools->addModules('search'); // search
$stools->addFeatures('colors');//Template colors
$stools->addModules('bookmarks'); // bookmarks
?>
</div>
</div>	

<div id="ju-header" class="ju-header">
<div class="ju-base">	
<?php 
$stools->addFeatures('logo');//Logo
?>
<?php 
$stools->addModules("mainmenu"); //position mainmenu
?>
</div>
<div class="clearfix">
</div>	
</div>

<?php if ($stools->showSlideItem()): ?>
<div id="slides">
<?php include 'slider/slider.php'; ?> 
</div>
<?php endif; ?>
<?php if ($this->countModules('header')): ?>
<div id="slides">
<div class="ju-base">
<?php 
$stools->addModules("header"); //position header
?>
</div>
</div>
<?php endif; ?>
<div id="tops">
<div class="ju-base">
<?php
$stools->addModules('top1, top2, top3, top4, top5, top6', 'ju_block', 'ju-userpos'); //positions top1-top6 
?>
</div>
</div>
	
<div class="ju-base main-bg clearfix">	
<?php 
$stools->addModules("breadcrumbs"); //breadcrumbs
?>
<?php if($this->params->get('socialCode')=='1') : ?>	
<?php $stools->addFeatures('social'); //social ?>	
<?php endif; ?>
<div class="clearfix">
<?php $stools->loadLayout(); //mainbody ?>
</div>
</div>
<?php if ($this->countModules( 'extra' )) : ?>
<div id="extra_main">
<?php
$stools->addModules('extra', 'ju_xhtml'); //bottom 
?>
</div>
<?php endif; ?> 
<?php if ($this->countModules( 'map' )) : ?>
<div id="map_main">
<?php
$stools->addModules('map', 'ju_xhtml'); //bottom 
?>
</div>
<?php endif; ?> 
<?php if ($this->countModules( 'bottom' )) : ?>
<div id="bott_main">
<div class="ju-base clearfix">	
<?php
$stools->addModules('bottom', 'ju_xhtml'); //bottom 
?>
</div>
</div>
<?php endif; ?> 
<?php if ($this->countModules( 'bottom1 or bottom2 or bottom3 or bottom4 or bottom5 or bottom6' )) : ?>
<div class="bott_col">
<?php
$stools->addModules('bottom1, bottom2, bottom3, bottom4, bottom5, bottom6', 'ju_block', 'ju-bottom', '', false, true); //positions bottom1-bottom6 
?>
</div>
<?php endif; ?> 
<!--Start Footer-->
<div id="ju-footer" class="clearfix">
<div class="ju-base">
<div class="cp">
<?php $stools->addFeatures('copyright,designed')  ?>					
</div>
<?php 		
$stools->addModules("footer-nav"); 
?>
</div>
</div>
<!--End Footer-->

	
<?php 
$stools->addFeatures('analytics,jquery,ieonly'); /*--- analytics, jquery features ---*/
?>
<jdoc:include type="modules" name="debug" />
</body>
</html>