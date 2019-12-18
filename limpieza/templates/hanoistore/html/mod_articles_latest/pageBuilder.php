<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="latestnews<?php echo $moduleclass_sfx; ?> recent_articles">
	<div class="sliders">
	<?php foreach ($list as $item) :  ?>
		<?php
		$attribs1 		= json_decode($item->attribs);
		$post_attribs = new JRegistry(json_decode( $item->attribs ));
		$post_format = $post_attribs->get('post_format', 'standard');
		$images 		= json_decode($item->images);
		$full_image 	= '';
		$icon = '';
		switch ($post_format) {
			case 'video':
				$icon = 'fa-video-camera';
        		break;
			default:
				$icon = 'fa-picture-o';
		}

		if(isset($attribs1->spfeatured_image) && $attribs1->spfeatured_image != '') {
			$full_image = $attribs1->spfeatured_image;
		} elseif(isset($images->image_intro) && !empty($images->image_intro)) {
			$full_image = $images->image_intro;
		}
		$commentsAPI = JPATH_SITE . '/components/com_jcomments/jcomments.php';
		if (file_exists($commentsAPI)) {
			require_once($commentsAPI);
			$count = JComments::getCommentsCount($item->id, 'com_content');
			if ($count > 1) {
				$text_comment = JText::sprintf('LINK_READ_COMMENTS_MORE', $count);
			} else {
				$text_comment = JText::sprintf('LINK_READ_COMMENTS_1', $count);
			}
		}
		?>
			<article class="item">
				<?php if(!empty($full_image) || (isset($images->image_intro) && !empty($images->image_intro))) {?>
				<div class="entry-media">
					<a href="<?php echo $item->link; ?>"><img class="img-responsive" src="<?php echo JURI::root().$full_image;?>" alt="<?php echo $item->title; ?>"></a>
				</div>
				<?php }?>
				<div class="entry-main">
					<h2 class="entry-title"><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></h2>
					<div class="entry-meta">
						<span><i class="zmdi zmdi-alarm-check zmdi-hc-fw"></i> <?php echo date("d M Y", strtotime($item->created));?></span>
						<span><i class="zmdi zmdi-folder zmdi-hc-fw"></i> <a class="entry-meta__link" href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->catslug));?>"><?php echo $item->category_title;?></a></span>
					</div>
				</div>
			</article>
	<?php endforeach; ?>
	</div>
</div>
