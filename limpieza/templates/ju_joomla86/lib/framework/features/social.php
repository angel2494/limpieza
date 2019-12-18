<?php
/*---------------------------------------------------------------
# Package - Stools Framework  
# ---------------------------------------------------------------
# Author - joomla2you http://www.joomla2you.com
# Copyright (C) 2008 - 2013 joomla2you.com. All Rights Reserved. 
# Websites: http://www.joomla2you.com
-----------------------------------------------------------------*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');
?>
<div id="social-bookmarks">
<ul class="social-bookmarks">
<?php if($this->getParam('blogger_icon')) : ?>
<li class="blogger"><a href="<?php echo ($this->getParam('blogger_icon')); ?>">blogger</a></li>
<?php endif; ?>
<?php if($this->getParam('digg_icon')) : ?>
<li class="digg"><a href="<?php echo ($this->getParam('digg_icon')); ?>">digg</a></li>
<?php endif; ?>
<?php if ($this->getParam('facebook_icon')) : ?>
<li class="facebook"><a href="<?php echo ($this->getParam('facebook_icon')); ?>">facebook</a></li>
<?php endif; ?>
<?php if($this->getParam('flickr_icon')) : ?>
<li class="flickr"><a href="<?php echo ($this->getParam('flickr_icon')); ?>">flickr</a></li>
<?php endif; ?>
<?php if($this->getParam('google_icon')) : ?>
<li class="google"><a href="<?php echo ($this->getParam('google_icon')); ?>">google</a></li>
<?php endif; ?>
<?php if($this->getParam('linkedin_icon')) : ?>
<li class="linkedin"><a href="<?php echo ($this->getParam('linkedin_icon')); ?>">linkedin</a></li>
<?php endif; ?>
<?php if($this->getParam('myspace_icon')) : ?>
<li class="myspace"><a href="<?php echo ($this->getParam('myspace_icon')); ?>">myspace</a></li>
<?php endif; ?>
<?php if($this->getParam('pinterest_icon')) : ?>
<li class="pinterest"><a href="<?php echo ($this->getParam('pinterest_icon')); ?>">pinterest</a></li>
<?php endif; ?>
<?php if($this->getParam('stumble_icon')) : ?>
<li class="stumbleupon"><a href="<?php echo ($this->getParam('stumble_icon')); ?>">stumbleupon</a></li>
<?php endif; ?>
<?php if($this->getParam('twitter_icon')) : ?>
<li class="twitter"><a href="<?php echo ($this->getParam('twitter_icon')); ?>">twitter</a></li>
<?php endif; ?>
<?php if($this->getParam('rssfeed_icon')) : ?>
<li class="rss"><a href="<?php echo ($this->getParam('rssfeed_icon')); ?>">rss</a></li>
<?php endif; ?>
</ul>
</div>