<?php
defined( '_JEXEC' ) or die( 'resticted aceess' );
AddonParser::addAddon( 'sp_products_slider', 'sp_products_slider_addon' );
function sp_products_slider_addon( $atts ) {
	$class = $title = $type = $number = '';
	extract( spAddonAtts( array(
		"title"              => '',
		"type"               => '',
		"class"              => '',
		"number"              => '',
	), $atts ) );
	ob_start();
	if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
	if (!class_exists('CurrencyDisplay'))
		require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers' . DS . 'currencydisplay.php');
	$currency = CurrencyDisplay::getInstance( );
	VmConfig::loadConfig();
	VmConfig::loadJLang('mod_virtuemart_product', true);
	$mainframe = Jfactory::getApplication();
	$virtuemart_currency_id = $mainframe->getUserStateFromRequest( "virtuemart_currency_id", 'virtuemart_currency_id',vRequest::getInt('virtuemart_currency_id',0) );

	vmJsApi::jPrice();
	vmJsApi::cssSite();
	echo vmJsApi::writeJS();
	$productModel = VmModel::getModel('Product');
	$products = $productModel->getProductListing($type, $number, true, true, false, false, null);
	?>
	<div class="vs_slider_products <?php echo $class;?>">
		<div class="grid_products vs_clear">
			<div class="slider">
				<?php
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
					<div class="product">
						<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon', array('product' => $product, 'showRating' => 1)); ?>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
	<?php
	$html = ob_get_clean();
	return $html;
}