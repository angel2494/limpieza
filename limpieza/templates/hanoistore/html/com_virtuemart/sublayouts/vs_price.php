<?php
/**
 *
 * Show the product prices
 *
 * @package    VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_showprices.php 8024 2014-06-12 15:08:59Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined ('_JEXEC') or die('Restricted access');
$product = $viewData['product'];
$currency = $viewData['currency'];
$element = $viewData['element'];

?>
<<?php echo $element;?> class="price">
	<?php
	if ( VmConfig::get ('checkout_show_origprice', 1) && $product->prices['discountedPriceWithoutTax'] != $product->prices['priceWithoutTax'] ) { ?>
		<del><span class="amount"><?php echo $currency->priceDisplay( $product->prices['basePriceVariant']); ?></span></del>
	<?php }
	if ($product->prices['discountedPriceWithoutTax']) { ?>
		<ins><span class="amount"><?php echo $currency->priceDisplay($product->prices['discountedPriceWithoutTax']); ?></span></ins>
	<?php } else { ?>
		<span class="amount"><?php echo $currency->priceDisplay($product->prices['basePriceVariant']); ?></span>
	<?php } ?>
</<?php echo $element;?>>

