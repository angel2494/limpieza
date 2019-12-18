<?php
/**
*
* Layout for the add to cart popup
*
* @package	VirtueMart
* @subpackage Cart
* @author Max Milbers
*
* @link http://www.virtuemart.net
* @copyright Copyright (c) 2013 VirtueMart Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @version $Id: cart.php 2551 2010-09-30 18:52:40Z milbo $
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

echo '<div class="pop_add">';
if($this->products){
	foreach($this->products as $product){
		if($product->quantity>0){
			echo '<h4>'.vmText::sprintf('COM_VIRTUEMART_CART_PRODUCT_ADDED',$product->product_name,$product->quantity).'</h4>';
		} else {
			if(!empty($product->errorMsg)){
				echo '<div>'.$product->errorMsg.'</div>';
			}
		}

	}
}

$sef_link_continue = JRoute::_(str_replace(JURI::root(), '', $this->continue_link), FALSE);
echo '<a class="continue_link" href="' . $sef_link_continue . '" >' . vmText::_('COM_VIRTUEMART_CONTINUE_SHOPPING') . '</a>';
$sef_link = JRoute::_(str_replace(JURI::root(), '', $this->cart_link), FALSE);
echo '<a class="showcart floatright" href="' . $sef_link . '">' . vmText::_('COM_VIRTUEMART_CART_SHOW') . '</a>';
echo '</div>';

?><br style="clear:both">
