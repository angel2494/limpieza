<?php
/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2016 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('restricted aceess');

AddonParser::addAddon('sp_vs_skillbar','sp_vs_skillbar_addon');
AddonParser::addAddon('sp_vs_skillbar_item','sp_vs_skillbar_item_addon');

function sp_vs_skillbar_addon($atts, $content){

	$class = '';
	extract(spAddonAtts(array(
		"class"=>'',
	), $atts));
	ob_start();
	?>
	<div class="vs_skillbar">
		<?php echo AddonParser::spDoAddon($content);?>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}

function sp_vs_skillbar_item_addon( $atts ){

	$title = $percen = $color = "";
	extract(spAddonAtts(array(
		"title"=>'',
		"percen"=>'',
		"color"=>'',
	), $atts));
	ob_start();
	?>
	<div class="skillbar clearfix" data-percent="<?php echo $percen;?>%">
		<div class="skillbar-title"><span><?php echo $title;?></span></div>
		<div class="skillbar-bar" style="background-color: <?php echo $color;?>"></div>
		<div class="skill-bar-percent"><?php echo $percen;?>%</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}