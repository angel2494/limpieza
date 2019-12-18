<?php
defined( '_JEXEC' ) or die( 'resticted aceess' );
AddonParser::addAddon( 'sp_vs_categories', 'sp_vs_categories_addon' );
AddonParser::addAddon( 'sp_vs_categories_item', 'sp_vs_categories_item_addon' );
function sp_vs_categories_addon( $atts, $content ) {
	$class = $title = '';
	extract( spAddonAtts( array(
		'class' => '',
		'title' => '',
	), $atts ) );
	ob_start();
	?>
	<div class="vs_categories_vm">
		<div class="slider">
			<?php echo AddonParser::spDoAddon($content);?>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}
function sp_vs_categories_item_addon( $atts ){
	$title = $img = '';
	$cat = 0;
	extract(spAddonAtts(array(
		"cat"=>0,
		'img' => '',
		'title' => '',
	), $atts));
	ob_start();
	defined('DS') or define('DS', DIRECTORY_SEPARATOR);
	if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
	VmConfig::loadConfig();
	$catModel = VmModel::getModel('Category');
	$category = $catModel->getCategory($cat);
	$count = $catModel->countProducts($cat);
	$caturl = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$category->virtuemart_category_id);
	?>
	<div class="item_cats">
		<div class="image">
			<a href="<?php echo $caturl;?>"><img src="<?php echo $img;?>" alt=""></a>
		</div>
		<div class="info">
			<h3><a href="<?php echo $caturl;?>"><?php echo $category->category_name;?></a></h3>
			<span><?php echo $count;?> <?php echo JTEXT::_('VS_PRODUCTS');?></span>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}