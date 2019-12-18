<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

AddonParser::addAddon('sp_vs_list_progress','sp_vs_list_progress_addon');
AddonParser::addAddon('sp_vs_list_progress_item','sp_vs_list_progress_item_addon');

function sp_vs_list_progress_addon($atts, $content){

	$class = $link_video = $img = '';
	extract(spAddonAtts(array(
		"class"=>'',
		"img" => '',
		"link_video" => '',
	), $atts));
	ob_start();
	?>
	<div class="section-progress clearfix">
		<ul class="list-progress list-progress_mod-a list-progress_left list-unstyled">
			<?php
			preg_match_all('/\[[^\]]*\]/i', $content, $matches);
			$i=0;
			if (isset($matches[0]) && count($matches[0] > 0)) {
				foreach ($matches[0] as $item) {
					$i++;
					echo '<li class="list-progress__item clearfix">';
					echo AddonParser::spDoAddon($item);
					echo '</li>';
					if($i==3) echo '</ul><ul class="list-progress list-progress_mod-a list-progress_right list-unstyled">';
				}
			}
			?>
		</ul><!-- end list-progress -->
		<div class="progress-center">
			<img class="center-block img-responsive" src="<?php echo $img;?>" alt="background">
			<a class="progress-center__link prettyPhoto" href="<?php echo $link_video;?>"><i class="icon fa fa-play"></i></a>
			<div class="progress-center__title ui-title-inner"><?php echo JText::_( 'WATCH_VIDEO' );?></div>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}

function sp_vs_list_progress_item_addon( $atts ){

	$number = $title = "";
	extract(spAddonAtts(array(
		"title"=>'',
		"number"=>'',
	), $atts));
	ob_start();
	?>
		<div class="list-progress__inner">
			<span class="list-progress__percent chart" data-percent="<?php echo $number;?>"><span class="percent"><?php echo $number;?></span><canvas height="0" width="0"></canvas></span>
			<span class="list-progress__name"><?php echo $title;?></span>
			<div class="decor-3"></div>
		</div>
	<?php
	$html = ob_get_clean();
	return $html;
}