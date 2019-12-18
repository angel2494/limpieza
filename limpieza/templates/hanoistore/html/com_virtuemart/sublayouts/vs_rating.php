<?php defined('_JEXEC') or die('Restricted access');
$product = $viewData['product'];
if(isset($viewData['count_review']))
	$count_review = $viewData['count_review'];
$show_review = $viewData['show_review'];
if ($viewData['showRating']) {
	$maxrating = VmConfig::get('vm_maximum_rating_scale', 5);
	if (empty($product->rating)) {
	?>
		<div class="ratingbox dummy" title="<?php echo vmText::_('COM_VIRTUEMART_UNRATED'); ?>" >
		</div>
	<?php } else {
		$ratingwidth = $product->rating * 13;
		?>
		<div title=" <?php echo (vmText::_("COM_VIRTUEMART_RATING_TITLE") . round($product->rating) . '/' . $maxrating) ?>" class="ratingbox" >
		  <div class="stars-orange" style="width:<?php echo $ratingwidth.'px'; ?>"></div>
		</div>
	<?php }?>
	<?php if($show_review) {?>
		<span class="view_reviews">
			(<?php
			if(!$count_review) {
				echo JText::_('VIRTUEMART_SHOP_NO_CUSTOMER_REVIEW');
			} else {
				echo $count_review.' '.JText::_('VIRTUEMART_SHOP_CUSTOMER_REVIEW');
			}
			?>)
		</span>
		<span class="link_reviews">
			<a href=""><?php echo JText::_('VIRTUEMART_SHOP_ADD_TO_REVIEW');?></a>
		</span>
	<?php }?>
<?php }?>