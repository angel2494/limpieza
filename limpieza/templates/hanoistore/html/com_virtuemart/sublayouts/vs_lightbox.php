<?php
/**
 * Created by PhpStorm.
 * User: PTH
 * Date: 10/15/2015
 * Time: 11:59 AM
 */
defined('_JEXEC') or die('Restricted access');
$product = $viewData['product'];
$productModel = VmModel::getModel('product');
$pr_images = $productModel->getProduct($product->virtuemart_product_id,TRUE,TRUE,TRUE,1);
$productModel->addImages($pr_images);
$currency = $viewData['currency'];
?>
<div class="content_pop vs_lightbox_shop">
	<div class="row">
		<div class="col-md-6">
			<div id="myCarousel<?php echo $product->virtuemart_product_id;?>" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php for ($i = 0; $i < count($pr_images->images); $i++) {
					$image = $pr_images->images[$i];
					?>
					<div class="item <?php if($i==0) echo 'active';?>">
						<img src="<?php	echo $image->file_url;?>" alt="">
					</div>
					<?php } ?>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel<?php echo $product->virtuemart_product_id;?>" role="button" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right carousel-control" href="#myCarousel<?php echo $product->virtuemart_product_id;?>" role="button" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>

			</div>
		</div>
		<div class="col-md-6">
			<h3 class="product_title entry-title"><?php echo $product->product_name; ?></h3>
			<div class="product_meta">
				<span class="cats"><?php echo JText::_('VIRTUEMART_SHOP_CATEGORIES'); ?>:
					<?php
					$link_cats = array();
					foreach( $product->categoryItem as $categoryitem ) {
						$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $categoryitem['virtuemart_category_id'], FALSE);
						$link_cats[] = '<a href="' . $catURL . '" rel="tag">' . $categoryitem['category_name'] . '</a>';
					}
					echo implode(', ', $link_cats);
					?>
				</span>
			</div>
			<div itemscope="" itemtype="http://schema.org/Offer">

				<?php echo shopFunctionsF::renderVmSubLayout('vs_price',array('product'=>$product,'currency'=>$currency,'element'=>'p')); ?>

				<meta itemprop="price" content="<?php echo $product->prices['basePriceWithTax']; ?>">
				<meta itemprop="priceCurrency" content="<?php $currency->_vendorCurrency_code_3; ?>">
				<link itemprop="availability" href="http://schema.org/InStock">

			</div>
			<div class="star-rating">
				<?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>1,'product'=>$product)); ?>
			</div>
			<?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'row'=>0)); ?>
			<div class="description">
				<p><?php echo $product->product_s_desc; ?></p>
			</div>
			<?php
			echo shopFunctionsF::renderVmSubLayout('ob_share',array('product'=>$product));
			?>
			<div class="clear"></div>
		</div>
		<a href="<?php echo $product->link.$ItemidStr; ?>" target="_top" class="quick-view-detail"><?php echo JText::_('VIRTUEMART_SHOP_VIEW_DETAIL'); ?></a>
	</div>
</div>