<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( 'JPATH_BASE' ) or die;

if ( $displayData['params']->get( 'audio' ) ) {
	$new_if = str_replace('width="100%"','style="width:100%;"',$displayData['params']->get( 'audio' ));
	$new_if = str_replace('frameborder="no"','',$new_if);
	$new_if = str_replace('scrolling="no"','',$new_if);
	$new_if = str_replace('&','&amp;',$new_if);
	?>
	<div class="entry-audio embed-responsive embed-responsive-16by9">
		<?php echo $new_if; ?>
	</div>
	<?php
}
