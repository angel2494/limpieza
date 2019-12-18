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
if (!empty($product->images[0])) {
    $image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
    $image_full = $product->images[0]->displayMediaFull();
} else {
    $image = '';
}
?>
<div class="item">
    <div class="inner">
        <div class="row">
            <div class="thumb col-lg-3">
                <?php echo $image;?>
                <div class="hover">
                    <?php
                    if (!empty($product->images[1])) {
                        $image_1 = $product->images[1]->displayMediaThumb ('class="featuredProductImage"', FALSE);
                        echo $image_1;
                    }
                    ?>
                </div>
            </div>
            <div class="info col-lg-6">
                <?php $url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
                <h2><a href="<?php echo $url;?>"><?php echo $product->product_name ?></a></h2>
                <div class="star-rating">
                    <?php echo shopFunctionsF::renderVmSubLayout('vs_rating',array('showRating'=>$showRating, 'product'=>$product, 'show_review'=>1, 'count_review'=>count($product->rating_reviews)));?>
                </div>
                <div class="description">
                    <?php echo $product->product_s_desc; ?>
                </div>
            </div>
            <div class="action col-lg-3 tCenter">
                <div class="vs_price">
                    <?php echo shopFunctionsF::renderVmSubLayout('vs_price',array('product'=>$product,'currency'=>$currency,'element'=>'p')); ?>
                </div>
                <div class="cart_box">
                    <?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'row'=>0)); ?>
                </div>
            </div>
        </div>
    </div>
</div>