<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;
$params = $displayData->params;
if ( isset( $displayData->custom_class ) ) {
	$custom_class = $displayData->custom_class;
} else {
	$custom_class = '';
}
?>
<?php $images = json_decode( $displayData->images ); ?>
<?php if ( isset( $images->image_intro ) && !empty( $images->image_intro ) ) : ?>
	<div class="entry-image intro-image <?php echo $custom_class; ?>">
		<?php if ( $params->get( 'link_titles' ) && $params->get( 'access-view' ) ) : ?>
			<a href="<?php echo JRoute::_( ContentHelperRoute::getArticleRoute( $displayData->slug, $displayData->catid, $displayData->language ) ); ?>"><img
					<?php if ( $images->image_intro_caption ):
						echo 'class="caption"' . ' title="' . htmlspecialchars( $images->image_intro_caption ) . '"';
					endif; ?>
					src="<?php echo htmlspecialchars( $images->image_intro ); ?>"
					alt="<?php echo htmlspecialchars( $images->image_intro_alt ); ?>" itemprop="thumbnailUrl" /></a>
		<?php else : ?><img
			<?php if ( $images->image_intro_caption ):
				echo 'class="caption"' . ' title="' . htmlspecialchars( $images->image_intro_caption ) . '"';
			endif; ?>
			src="<?php echo htmlspecialchars( $images->image_intro ); ?>"
			alt="<?php echo htmlspecialchars( $images->image_intro_alt ); ?>" itemprop="thumbnailUrl"/>
		<?php endif; ?>
	</div>
<?php endif; ?>
