<?php
defined( '_JEXEC' ) or die( 'resticted aceess' );
AddonParser::addAddon( 'sp_heading', 'sp_heading_addon' );
function sp_heading_addon( $atts ) {
	$class = $title = $style = $align = '';
	extract( spAddonAtts( array(
		"title"              => '',
		"style"         => '',
		"class"              => '',
		"align"              => '',
	), $atts ) );
	ob_start();
	?>
	<div class="vs_heading <?php echo $class.' '.$style;?>">
		<h2 class="<?php echo $align;?>"><span><?php echo $title;?></span></h2>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}