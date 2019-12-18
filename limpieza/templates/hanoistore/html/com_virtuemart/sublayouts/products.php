<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */

defined('_JEXEC') or die('Restricted access');
$products_per_row = $viewData['products_per_row'];
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}
foreach ($viewData['products'] as $type => $products ) {
	$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);
	// Calculating Products Per Row
	$cellwidth = ' width'.floor ( 100 / $products_per_row );
	$BrowseTotalProducts = count($products);
	$col = 1;
	$nb = 1;
	$row = 1;
	?>
	<div class="grid_products item_switch active">
		<div class="row">
			<?php
			$productModel = VmModel::getModel('Product');
			$productModel->addImages($products);
			foreach ( $products as $product ) {

				// Show Products ?>
				<div class="product vm-col<?php echo ' vm-col-' . $products_per_row ?>">
					<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon',array('product'=>$product,'showRating'=>$showRating));?>
				</div>
			<?php }	?>
		</div>
	</div>
	<div class="list_products item_switch">
		<?php
		foreach ( $products as $product ) {
			// Show Products ?>
			<div class="product">
				<?php echo shopFunctionsF::renderVmSubLayout('vs_list',array('product'=>$product,'showRating'=>$showRating));?>
			</div>
		<?php }	?>
	</div>
	<?php
}
