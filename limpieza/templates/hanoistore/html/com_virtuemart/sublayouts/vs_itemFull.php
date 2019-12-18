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
        <div class="icon">
            <?php if($product->product_special==1) {?>
                <span class="special"><?php echo JText::_('VS_HOT'); ?></span>
            <?php }?>
            <?php if ( $product->prices['discountedPriceWithoutTax'] != $product->prices['priceWithoutTax'] ) {?>
                <span class="sale"><?php echo JText::_('VS_SALES'); ?></span>
            <?php }?>
        </div>
        <div class="thumb">
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
        <h2><a href="<?php echo $url;?>"><?php echo $product->product_name ?></a></h2>
        <div class="vs_price">
            <?php echo shopFunctionsF::renderVmSubLayout('vs_price',array('product'=>$product,'currency'=>$currency,'element'=>'p')); ?>
        </div>
    </div>
</div>