<?php
$product = $viewData['product'];
$showRating = $viewData['showRating'];
if (!class_exists('CurrencyDisplay'))
    require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers' . DS . 'currencydisplay.php');
$currency = CurrencyDisplay::getInstance( );
$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
    $ItemidStr = '&Itemid='.$Itemid;
}
//var_dump($product);
if (!empty($product->images[0])) {
    $image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
    $image_full = $product->images[0]->displayMediaFull();
} else {
    $image = '';
}
$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id);
?>
<div class="item">
    <div class="inner">
        <div class="icon">
            <?php if($product->product_special==1) {?>
                <span class="special"><?php echo JText::_('VS_HOT'); ?></span>
            <?php }?>
            <?php if ( $product->prices['discountedPriceWithoutTax'] != $product->prices['priceWithoutTax'] ) {?>
                <span class="sale"><?php echo JText::_('VS_SALES'); ?></span>
            <?php }?>
        </div>
        <div class="thumb">
            <a href="<?php echo $url;?>">
                <?php echo $image;?>
                <div class="hover">
                    <?php
                    if (!empty($product->images[1])) {
                        $image_1 = $product->images[1]->displayMediaThumb ('class="featuredProductImage"', FALSE);
                        echo $image_1;
                    }
                    ?>
                </div>
            </a>
        </div>
        <h3><a href="<?php echo $url;?>"><?php echo $product->product_name ?></a></h3>
        <div class="star-rating">
            <?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>1,'product'=>$product)); ?>
        </div>
        <div class="vs_price">
            <?php echo shopFunctionsF::renderVmSubLayout('vs_price',array('product'=>$product,'currency'=>$currency,'element'=>'span')); ?>
        </div>
        <div class="add_cart item_action">
            <?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'row'=>0,'show_qty'=>false)); ?>
        </div>
        <div class="quick_view item_action">
            <a data-toggle="modal" data-target="#productCat<?php echo $product->virtuemart_product_id;?>"><i class="zmdi zmdi-plus zmdi-hc-fw"></i>  <?php echo JText::_('VS_QUICKVIEW');?></a>
        </div>
        <!-- Modal -->
        <div id="productCat<?php echo $product->virtuemart_product_id;?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <?php echo shopFunctionsF::renderVmSubLayout('vs_lightbox',array('product'=>$product,'currency'=>$currency)); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>