<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;
$count = count( $list );
?>
<div class="latestnews <?php echo $moduleclass_sfx; ?> recent_article">


				<?php
				foreach ($list as $item) {
					?>
					<div class="from_blog item">
						<?php
						$post_attribs = new JRegistry(json_decode( $item->attribs ));
						$post_format = $item->params->get( 'post_format', '' );
						$author = ( $item->created_by_alias ? $item->created_by_alias : $item->author );
						$attribs1 		= json_decode($item->attribs);
						$images 		= json_decode($item->images);
						if(isset($attribs1->spfeatured_image) && $attribs1->spfeatured_image != '') {
							$full_image = $attribs1->spfeatured_image;
						} elseif(isset($images->image_intro) && !empty($images->image_intro)) {
							$full_image = $images->image_intro;
						}
						?>
						<div itemscope itemtype="http://schema.org/Article">
							<?php if(!empty($full_image) || (isset($images->image_intro) && !empty($images->image_intro))) {?>
							<div class="entry-image">
								<a href="<?php echo $item->link; ?>"><img class="img-responsive" src="<?php echo JURI::root().$full_image;?>" alt="<?php echo $item->title; ?>"></a>
							</div>
							<?php }?>
							<div class="article-title-wrapper">
								<h4><a class="article-title" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h4>
								<div class="article-info">
									<span class="date">on <?php echo JHtml::_( 'date', $item->created, 'd M Y' ); ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>

		<!-- Left and right controls -->
</div>
