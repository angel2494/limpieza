<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

AddonParser::addAddon('sp_vs_team','sp_vs_team_addon');
AddonParser::addAddon('sp_vs_team_item','sp_vs_team_item_addon');

function sp_vs_team_addon($atts, $content){

	$class = $title = '';
	extract(spAddonAtts(array(
		"class"=>'',
		"title" => '',
	), $atts));
	ob_start();
	?>
	<div class="vs_teams">
		<div class="slider">
			<?php echo AddonParser::spDoAddon($content);?>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}

function sp_vs_team_item_addon( $atts ){

	$img = $name = $job = $content = $fb = $tw = $in = $go = "";
	extract(spAddonAtts(array(
		"name"=>'',
		"img"=>'',
		"job"=>'',
		"content"=>'',
		"fb"=>'',
		"tw"=>'',
		"in"=>'',
		"go"=>'',
	), $atts));
	ob_start();
	?>
	<div class="item">
		<div class="thumb">
			<img src="<?php echo $img;?>" alt="<?php echo $name;?>">
			<div class="hover">
				<span class="inner"></span>
				<ul class="social">
					<li><a target="_blank" href="<?php echo $fb;?>"><i class="icon fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="<?php echo $tw;?>"><i class="icon fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="<?php echo $in;?>"><i class="icon fa fa-linkedin"></i></a></li>
					<li><a target="_blank" href="<?php echo $go;?>"><i class="icon fa fa-google"></i></a></li>
				</ul>
			</div>
		</div>
		<div class="info">
			<h3><?php echo $name;?></h3>
			<span><?php echo $job;?></span>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}