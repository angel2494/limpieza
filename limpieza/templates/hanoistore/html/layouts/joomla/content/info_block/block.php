<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( 'JPATH_BASE' ) or die;

$blockPosition = $displayData['params']->get( 'info_block_position', 0 );

?>
<ul class="article-info">

	<?php if ( $displayData['position'] == 'above' && ( $blockPosition == 0 || $blockPosition == 2 )
		|| $displayData['position'] == 'below' && ( $blockPosition == 1 )
	) : ?>

		<!--		<li class="article-info-term"></li>-->

		<?php if ( $displayData['params']->get( 'show_author' ) && !empty( $displayData['item']->author ) ) : ?>
			<?php echo JLayoutHelper::render( 'joomla.content.info_block.author', $displayData ); ?>
		<?php endif; ?>

		<?php if ( $displayData['params']->get( 'show_parent_category' ) && !empty( $displayData['item']->parent_slug ) ) : ?>
			<?php echo JLayoutHelper::render( 'joomla.content.info_block.parent_category', $displayData ); ?>
		<?php endif; ?>

		<?php if ( $displayData['params']->get( 'show_category' ) ) : ?>
			<?php echo JLayoutHelper::render( 'joomla.content.info_block.category', $displayData ); ?>
		<?php endif; ?>

		<?php echo JLayoutHelper::render( 'joomla.content.comments.comments_count', $displayData ); //Helix Comment Count ?>
	<?php endif; ?>

	<?php if ($displayData['params']->get('show_publish_date')) : ?>
		- <?php echo JLayoutHelper::render('joomla.content.info_block.create_date', $displayData); ?>
	<?php endif; ?>

	<?php if (isset($displayData['item']->cook_time) && $displayData['item']->cook_time != '') : ?>
		<?php echo JLayoutHelper::render('joomla.content.info_block.cook_time', $displayData); ?>
	<?php endif; ?>

	<?php if ( $displayData['position'] == 'above' && ( $blockPosition == 0 )
		|| $displayData['position'] == 'below' && ( $blockPosition == 1 || $blockPosition == 2 )
	) : ?>
		<?php if ( $displayData['params']->get( 'show_hits' ) ) : ?>
			<?php echo JLayoutHelper::render( 'joomla.content.info_block.hits', $displayData ); ?>
		<?php endif; ?>
	<?php endif; ?>

</ul>
