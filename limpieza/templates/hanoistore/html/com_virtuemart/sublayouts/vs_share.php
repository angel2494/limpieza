<?php
$product = $viewData['product'];
$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
    $ItemidStr = '&Itemid='.$Itemid;
}
$productModel = VmModel::getModel('product');
$pr_images = $productModel->getProduct($product->virtuemart_product_id,TRUE,TRUE,TRUE,1);
$productModel->addImages($pr_images);
$image_url = JUri::root() . $pr_images->images[0]->file_url;
$share_img = urlencode($image_url);
$share_url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .
    $product->virtuemart_category_id);
?>
<div class="vs_share_product">
    <ul class="share_show">
        <li>
            <a target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?app_id=113869198637480&sdk=joey&u=<?php echo $share_url;?>&display=popup&ref=plugin&src=share_button" title="Facebook">
                <i class="fa fa-facebook"></i> Facebook
            </a>
        </li>
        <li>
            <a target="_blank" class="twitter" href="https://twitter.com/share?url=<?php echo $share_url;?>&text=<?php echo $product->slug; ?>" title="Twitter">
                <i class="fa fa-twitter"></i> Twitter
            </a>
        </li>
        <li>
            <a target="_blank" class="googleplus" href="https://plus.google.com/share?url=<?php echo $share_url;?>&title=<?php echo $product->slug; ?>" title="Google Plus" onclick="javascript:window.open(this.href);return false;">
                <i class="fa fa-google"></i> Google
            </a>
        </li>
        <li>
            <a target="_blank" class="pinterest" href="">
                <i class="fa fa-pinterest"></i> Pinterest
            </a>
        </li>
    </ul>
</div>