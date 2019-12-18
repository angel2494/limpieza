<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Eugen Stranz, Max Galt
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 9185 2016-02-25 13:51:01Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

/* Let's see if we found the product */
if (empty($this->product)) {
	echo vmText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
	echo '<br /><br />  ' . $this->continue_link_html;
	return;
}

echo shopFunctionsF::renderVmSubLayout('askrecomjs',array('product'=>$this->product));



if(vRequest::getInt('print',false)){ ?>
<body onload="javascript:print();">
<?php } ?>

<div class="productdetails-view productdetails list_products_cat" >

    <?php
    // Product Navigation
    if (VmConfig::get('product_navigation', 1)) {
	?>
        <div class="product-neighbours">
	    <?php
	    if (!empty($this->product->neighbours ['previous'][0])) {
		$prev_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['previous'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
		echo JHtml::_('link', $prev_link, $this->product->neighbours ['previous'][0]
			['product_name'], array('rel'=>'prev', 'class' => 'previous-page','data-dynamic-update' => '1'));
	    }
	    if (!empty($this->product->neighbours ['next'][0])) {
		$next_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['next'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
		echo JHtml::_('link', $next_link, $this->product->neighbours ['next'][0] ['product_name'], array('rel'=>'next','class' => 'next-page','data-dynamic-update' => '1'));
	    }
	    ?>
    	<div class="clear"></div>
        </div>
    <?php } // Product Navigation END
    ?>

	<?php // Back To Category Button
	if ($this->product->virtuemart_category_id) {
		$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$this->product->virtuemart_category_id, FALSE);
		$categoryName = vmText::_($this->product->category_name) ;
	} else {
		$catURL =  JRoute::_('index.php?option=com_virtuemart');
		$categoryName = vmText::_('COM_VIRTUEMART_SHOP_HOME') ;
	}
	?>


	<div class="row">
		<div class="col-sm-6 col-xs-12 media_product">
			<div class="vm-product-media-container">
				<?php
				echo $this->loadTemplate('images');
				?>
			</div>
			<?php
			$count_images = count ($this->product->images);
			if ($count_images > 1) {
				echo $this->loadTemplate('images_additional');
			}
			?>
		</div>
		<div class="col-sm-6 col-xs-12 product_info">
			<h1 itemprop="name"><?php echo $this->product->product_name ?></h1>
			<?php echo $this->product->event->afterDisplayTitle ?>
			<div class="star-rating">
				<?php echo shopFunctionsF::renderVmSubLayout('vs_rating',array('showRating'=>1, 'product'=>$this->product, 'show_review'=>1, 'count_review'=>count($this->rating_reviews)));?>
			</div>
			<div class="vs_price">
				<?php
				echo shopFunctionsF::renderVmSubLayout('vs_price',array('product'=>$this->product,'currency'=>$this->currency,'element'=>'p'));
				?>
			</div>
			<div class="desc">
				<?php
				// Product Short Description
				if (!empty($this->product->product_s_desc)) {
					?>
					<div class="product-short-description">
						<?php
						/** @todo Test if content plugins modify the product description */
						echo nl2br($this->product->product_s_desc);
						?>
					</div>
					<?php
				} // Product Short Description END
				echo $this->product->event->beforeDisplayContent;
				?>
			</div>
			<div class="add_cart">
				<?php
				echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$this->product));
				echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$this->product));
				// Ask a question about this product
				if (VmConfig::get('ask_question', 0) == 1) {
					$askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component', FALSE);
					?>
					<div class="ask-a-question">
						<a class="ask-a-question" href="<?php echo $askquestion_url ?>" rel="nofollow" ><?php echo vmText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>
					</div>
					<?php
				}
				?>
			</div>
			<div class="product_meta">
					<span class="sku">
						<label><?php echo JText::_('VIRTUEMART_SHOP_SKU'); ?>:</label> <?php echo $this->product->product_sku;?>
					</span>
					<span class="cats">
						<label><?php echo JText::_('VIRTUEMART_SHOP_CATEGORIES'); ?>:</label>
						<?php
						$link_cats = array();
						foreach( $this->product->categoryItem as $categoryitem ) {
							$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $categoryitem['virtuemart_category_id'], FALSE);
							$link_cats[] = '<a href="' . $catURL . '" rel="tag">' . $categoryitem['category_name'] . '</a>';
						}
						echo implode(', ', $link_cats);
						?>
					</span>
			</div>

			<div class="vs_share">
				<?php echo shopFunctionsF::renderVmSubLayout('vs_share',array('product'=>$this->product));?>
			</div>

			<?php
			if (is_array($this->productDisplayShipments)) {
				foreach ($this->productDisplayShipments as $productDisplayShipment) {
					echo $productDisplayShipment . '<br />';
				}
			}
			if (is_array($this->productDisplayPayments)) {
				foreach ($this->productDisplayPayments as $productDisplayPayment) {
					echo $productDisplayPayment . '<br />';
				}
			}

			//In case you are not happy using everywhere the same price display fromat, just create your own layout
			//in override /html/fields and use as first parameter the name of your file

			?>


			<?php
			// Manufacturer of the Product
			if (VmConfig::get('show_manufacturers', 1) && !empty($this->product->virtuemart_manufacturer_id)) {
				echo $this->loadTemplate('manufacturer');
			}
			?>
		</div>
	</div>
	<div class="tabs_info">
		<div class="virtuemart-tabs vm-tabs-wrapper vs_clear">
			<ul class="tabs vm-tabs">
				<li class="tab" rel="description_tab">
					<a href="" class="active"><?php echo vmText::_('COM_VIRTUEMART_PRODUCT_DESC_TITLE') ?></a>
				</li>
				<li class="tab" rel="review_tab">
					<a href=""><?php echo vmText::_ ('COM_VIRTUEMART_REVIEWS') ?> (<?php echo count($this->rating_reviews);?>)</a>
				</li>
			</ul>
			<div class="content_tab">
				<div class="item_tab description_tab active" id="tab-description">
					<h2><?php echo vmText::_ ('COM_VIRTUEMART_PRODUCT_DESCRIPTION') ?></h2>
					<?php
					// Product Description
					if (!empty($this->product->product_desc)) {
						echo $this->product->product_desc;
					} // Product Description END
					?>
				</div>
				<div class="item_tab review_tab" id="tab-reviews">
					<h2><?php echo vmText::_ ('COM_VIRTUEMART_PRODUCT_REVIEW') ?></h2>
					<?php echo $this->loadTemplate('reviews'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="customfield">
		<?php
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'ontop'));

		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'normal'));

		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'onbot'));

		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_products','class'=> 'product-related-products','customTitle' => true ));

		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_categories','class'=> 'product-related-categories'));
		?>
	</div>


<?php


	// event onContentBeforeDisplay




    // Product Packaging
    $product_packaging = '';
    if ($this->product->product_box) {
	?>
        <div class="product-box">
	    <?php
	        echo vmText::_('COM_VIRTUEMART_PRODUCT_UNITS_IN_BOX') .$this->product->product_box;
	    ?>
        </div>
    <?php } // Product Packaging END ?>

<?php // onContentAfterDisplay event




// Show child categories
if (VmConfig::get('showCategory', 1)) {
	echo $this->loadTemplate('showcategory');
}

$j = 'jQuery(document).ready(function($) {
	Virtuemart.product(jQuery("form.product"));

	$("form.js-recalculate").each(function(){
		if ($(this).find(".product-fields").length && !$(this).find(".no-vm-bind").length) {
			var id= $(this).find(\'input[name="virtuemart_product_id[]"]\').val();
			Virtuemart.setproducttype($(this),id);

		}
	});
});';
//vmJsApi::addJScript('recalcReady',$j);

/** GALT
 * Notice for Template Developers!
 * Templates must set a Virtuemart.container variable as it takes part in
 * dynamic content update.
 * This variable points to a topmost element that holds other content.
 */
$j = "Virtuemart.container = jQuery('.productdetails-view');
Virtuemart.containerSelector = '.productdetails-view';";

vmJsApi::addJScript('ajaxContent',$j);

if(VmConfig::get ('jdynupdate', TRUE)){
	$j = "jQuery(document).ready(function($) {
	Virtuemart.stopVmLoading();
	var msg = '';
	jQuery('a[data-dynamic-update=\"1\"]').off('click', Virtuemart.startVmLoading).on('click', {msg:msg}, Virtuemart.startVmLoading);
	jQuery('[data-dynamic-update=\"1\"]').off('change', Virtuemart.startVmLoading).on('change', {msg:msg}, Virtuemart.startVmLoading);
});";

	vmJsApi::addJScript('vmPreloader',$j);
}

echo vmJsApi::writeJS();

if ($this->product->prices['salesPrice'] > 0) {
  echo shopFunctionsF::renderVmSubLayout('snippets',array('product'=>$this->product, 'currency'=>$this->currency, 'showRating'=>$this->showRating));
}

?>
</div>



