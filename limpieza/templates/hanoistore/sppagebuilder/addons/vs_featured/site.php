<?php
defined( '_JEXEC' ) or die( 'resticted aceess' );
AddonParser::addAddon( 'sp_vs_featured', 'sp_vs_featured_addon' );
AddonParser::addAddon( 'sp_vs_featured_item', 'sp_vs_featured_item_addon' );
AddonParser::addAddon('sp_vs_featured_content', 'sp_vs_featured_content_addon');
function sp_vs_featured_addon( $atts, $content ) {
	$class = $title = '';
	extract( spAddonAtts( array(
		'class' => '',
		'title' => '',
	), $atts ) );
	ob_start();
	?>
	<div class="list_featured vs_clear tabs">
		<h2><?php echo $title;?></h2>
		<ul class="list_label tab">
			<?php echo AddonParser::spDoAddon($content);?>
		</ul>
		<div class="vs_clear"></div>
		<div class="content_tab">
			<?php
			$tab_content = str_replace('sp_vs_featured_item', 'sp_vs_featured_content', $content);
			preg_match_all('/\[[^\]]*\]/i', $tab_content, $matches);
			if (isset($matches[0]) && count($matches[0] > 0)) {
				$i = 0;
				foreach ($matches[0] as $item) {
					echo AddonParser::spDoAddon($item);
				}
			}
			?>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}
function sp_vs_featured_item_addon( $atts ){
	$cat = $title = $icon = '';
	extract(spAddonAtts(array(
		"cat"=>'',
		'title' => '',
		'icon' => '',
	), $atts));
	ob_start();
	?>
	<li rel="cat_<?php echo $cat;?>"><a href=""><i class="<?php echo $icon;?>"></i><p><?php echo $title;?></p></a></li>
	<?php
	$html = ob_get_clean();
	return $html;
}
function sp_vs_featured_content_addon($atts)
{
	$cat = $title = $icon = $number = $cols = '';
	extract(spAddonAtts(array(
		"cat"=>'',
		'number' => '',
		'cols' => '',
		'title' => '',
		'icon' => '',
	), $atts));
	ob_start();
	//$cols = 'col-md-'.$cols.' col-sm-4 col-xs-12';
	$int_rand = rand(1,1000);
	defined('DS') or define('DS', DIRECTORY_SEPARATOR);
	if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
	if (!class_exists('CurrencyDisplay'))
		require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers' . DS . 'currencydisplay.php');
	$currency = CurrencyDisplay::getInstance( );
	VmConfig::loadConfig();
	$mainframe = Jfactory::getApplication();
	$virtuemart_currency_id = $mainframe->getUserStateFromRequest( "virtuemart_currency_id", 'virtuemart_currency_id',vRequest::getInt('virtuemart_currency_id',0) );
	$productModel = VmModel::getModel('Product');
	if($cat=='all') {
		$products = $productModel->getProductListing('featured', $number, true, true, false, false);
	} else {
		$products = $productModel->getProductListing('featured', $number, true, true, false, true, $cat);
	}

	?>
	<div class="item_tab cat_<?php echo $cat;?>">
		<div class="grid_products vs_clear">
			<?php
			vmJsApi::jPrice();
			vmJsApi::cssSite();
			//echo vmJsApi::writeJS();
			$productModel->addImages($products);
			for( $i=0; $i< count($products); $i++ ) {
				?>
				<?php
				$product = $products[$i];
				if (!empty($product->images[0])) {
					$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
					$image_full = $product->images[0]->displayMediaFull();
				} else {
					$image = '';
				}
				$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id);
				?>
				<div class="product vm-col vm-col-<?php echo $cols;?>">
					<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon', array('product' => $products[$i], 'showRating' => 1)); ?>
				</div>
			<?php }?>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}