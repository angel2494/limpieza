<div class="cart_form_tbl">
<fieldset class="vm-fieldset-pricelist">
<table
	class="cart-summary"
	cellspacing="0"
	cellpadding="0"
	border="0"
	width="100%">
<tr>
	<th align="left"><?php echo vmText::_ ('COM_VIRTUEMART_CART_NAME') ?></th>
	<th align="left"></th>
	<th align="center"><?php echo vmText::_ ('COM_VIRTUEMART_CART_PRICE') ?></th>
	<th align="center"><?php echo vmText::_ ('COM_VIRTUEMART_CART_QUANTITY') ?>
		/ <?php echo vmText::_ ('COM_VIRTUEMART_CART_ACTION') ?></th>


	<?php if (VmConfig::get ('show_tax')) {
		$tax = vmText::_ ('COM_VIRTUEMART_CART_SUBTOTAL_TAX_AMOUNT');
		if(!empty($this->cart->cartData['VatTax'])){
			reset($this->cart->cartData['VatTax']);
			$taxd = current($this->cart->cartData['VatTax']);
			$tax = $taxd['calc_name'] .' '. rtrim(trim($taxd['calc_value'],'0'),'.').'%';
		}
		?>
	<th align="center"><?php echo "<span  class='priceColor2'>" . $tax . '</span>' ?></th>
	<?php } ?>
	<th align="right"><?php echo vmText::_ ('COM_VIRTUEMART_CART_TOTAL') ?></th>
</tr>

<?php
$i = 1;

foreach ($this->cart->products as $pkey => $prow) { ?>

<tr valign="top" class="sectiontableentry<?php echo $i ?>">
	<input type="hidden" name="cartpos[]" value="<?php echo $pkey ?>">
	<td align="left" class="title_product"  valign="middle" width="120">
		<?php if ($prow->virtuemart_media_id) { ?>
		<span class="cart-images">
						 <?php
			if (!empty($prow->images[0])) {
				echo $prow->images[0]->displayMediaThumb ('', FALSE);
			}
			?>
						</span>
		<?php } ?>


	</td>
	<td valign="middle" class="title_product">
		<?php echo JHtml::link ($prow->url, $prow->product_name);
		echo $this->customfieldsModel->CustomsFieldCartDisplay ($prow);
		?>
	</td>
	<td align="center" class="price" valign="middle" width="150">
		<?php
		if (VmConfig::get ('checkout_show_origprice', 1) && $prow->prices['discountedPriceWithoutTax'] != $prow->prices['priceWithoutTax']) {
			echo '<span class="line-through">' . $this->currencyDisplay->createPriceDiv ('basePriceVariant', '', $prow->prices, TRUE, FALSE) . '</span><br />';
		}

		if ($prow->prices['discountedPriceWithoutTax']) {
			echo $this->currencyDisplay->createPriceDiv ('discountedPriceWithoutTax', '', $prow->prices, FALSE, FALSE);
		} else {
			echo $this->currencyDisplay->createPriceDiv ('basePriceVariant', '', $prow->prices, FALSE, FALSE);
		}
		echo $this->currencyDisplay->createPriceDiv ('salesPrice', '', $prow->prices, FALSE, FALSE);
		?>
	</td>
	<td align="center" class="qty" valign="middle" width="200"><?php

				if ($prow->step_order_level)
					$step=$prow->step_order_level;
				else
					$step=1;
				if($step==0)
					$step=1;
				?>
		   <input type="text"
				   onblur="Virtuemart.checkQuantity(this,<?php echo $step?>,'<?php echo vmText::_ ('COM_VIRTUEMART_WRONG_AMOUNT_ADDED')?>');"
				   onclick="Virtuemart.checkQuantity(this,<?php echo $step?>,'<?php echo vmText::_ ('COM_VIRTUEMART_WRONG_AMOUNT_ADDED')?>');"
				   onchange="Virtuemart.checkQuantity(this,<?php echo $step?>,'<?php echo vmText::_ ('COM_VIRTUEMART_WRONG_AMOUNT_ADDED')?>');"
				   onsubmit="Virtuemart.checkQuantity(this,<?php echo $step?>,'<?php echo vmText::_ ('COM_VIRTUEMART_WRONG_AMOUNT_ADDED')?>');"
				   title="<?php echo  vmText::_('COM_VIRTUEMART_CART_UPDATE') ?>" class="quantity-input js-recalculate" size="3" maxlength="4" name="quantity[<?php echo $pkey; ?>]" value="<?php echo $prow->quantity ?>" />

			<button type="submit" class="vmicon vm2-add_quantity_cart" name="updatecart.<?php echo $pkey ?>"><i class="fa fa-refresh"></i></button>

			<button type="submit" class="vmicon vm2-remove_from_cart" name="delete.<?php echo $pkey ?>"><i class="fa fa-trash"></i></button>
	</td>

	<?php if (VmConfig::get ('show_tax')) { ?>
	<td align="center" valign="middle"><?php echo "<span class='priceColor2'>" . $this->currencyDisplay->createPriceDiv ('taxAmount', '', $prow->prices, FALSE, FALSE, $prow->quantity) . "</span>" ?></td>
	<?php } ?>

	<td colspan="1" align="right" valign="middle"  class="price_item" width="160">
		<?php
		echo $this->currencyDisplay->createPriceDiv ('salesPrice', '', $prow->prices, FALSE, FALSE, $prow->quantity) ?></td>
</tr>

	<?php
}
?>

</table>
	<div class="row">
		<div class="col-sm-6 col-xs-12">
			<div class="coupons">
				<?php if (!empty($this->layoutName) && $this->layoutName == 'default') {
					echo $this->loadTemplate ('coupon');
				} ?>

				<?php if (!empty($this->cart->cartData['couponCode'])) { ?>
					<?php
					echo $this->cart->cartData['couponCode'];
					echo $this->cart->cartData['couponDescr'] ? (' (' . $this->cart->cartData['couponDescr'] . ')') : '';
					?>
				<?php }?>
			</div>
		</div>
		<div class="col-sm-6 col-xs-12 tRight">
			<div class="row_list">
				<?php if ( 	VmConfig::get('oncheckout_opc',true) or
					!VmConfig::get('oncheckout_show_steps',false) or
					(!VmConfig::get('oncheckout_opc',true) and VmConfig::get('oncheckout_show_steps',false) and
						!empty($this->cart->virtuemart_shipmentmethod_id) )
				) { ?>
					<tr class="sectiontableentry1" style="vertical-align:top;">
						<?php if (!$this->cart->automaticSelectedShipment) { ?>
							<td colspan="4" style="align:left;vertical-align:top;">
							<?php
							echo '<h3>'.vmText::_ ('COM_VIRTUEMART_CART_SELECTED_SHIPMENT').'</h3>';
							echo $this->cart->cartData['shipmentName'].'<br/>';

							if (!empty($this->layoutName) and $this->layoutName == 'default') {
								if (VmConfig::get('oncheckout_opc', 0)) {
									$previouslayout = $this->setLayout('select');
									echo $this->loadTemplate('shipment');
									$this->setLayout($previouslayout);
								} else {
									echo JHtml::_('link', JRoute::_('index.php?option=com_virtuemart&view=cart&task=edit_shipment', $this->useXHTML, $this->useSSL), $this->select_shipment_text, 'class=""');
								}
							} else {
								echo vmText::_ ('COM_VIRTUEMART_CART_SHIPPING');
							}
							echo '</td>';
						} else {
							?>
							<td colspan="3" style="align:left;vertical-align:top;">
								<?php echo '<h4>'.vmText::_ ('COM_VIRTUEMART_CART_SELECTED_SHIPMENT').'</h4>'; ?>
								<?php echo $this->cart->cartData['shipmentName']; ?>
							</td>
						<?php } ?>

						<?php if (VmConfig::get ('show_tax')) { ?>
							<td align="center"><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv ('shipmentTax', '', $this->cart->cartPrices['shipmentTax'], FALSE) . "</span>"; ?> </td>
						<?php } ?>
						<td align="center"><?php if($this->cart->cartPrices['salesPriceShipment'] < 0) echo $this->currencyDisplay->createPriceDiv ('salesPriceShipment', '', $this->cart->cartPrices['salesPriceShipment'], FALSE); ?></td>
						<td align="center"><?php echo $this->currencyDisplay->createPriceDiv ('salesPriceShipment', '', $this->cart->cartPrices['salesPriceShipment'], FALSE); ?> </td>
					</tr>
				<?php } ?>
			</div>
			<div class="row_list">
				<?php if ($this->cart->pricesUnformatted['salesPrice']>0.0 and
					( 	VmConfig::get('oncheckout_opc',true) or
						!VmConfig::get('oncheckout_show_steps',false) or
						( (!VmConfig::get('oncheckout_opc',true) and VmConfig::get('oncheckout_show_steps',false) ) and !empty($this->cart->virtuemart_paymentmethod_id))
					)
				) { ?>
					<tr class="sectiontableentry1" style="vertical-align:top;">
						<?php if (!$this->cart->automaticSelectedPayment) { ?>
							<td colspan="2" style="align:left;vertical-align:top;">
								<?php
								echo '<h3>'.vmText::_ ('COM_VIRTUEMART_CART_SELECTED_PAYMENT').'</h3>';
								echo $this->cart->cartData['paymentName'].'<br/>';

								if (!empty($this->layoutName) && $this->layoutName == 'default') {
									if (VmConfig::get('oncheckout_opc', 0)) {
										$previouslayout = $this->setLayout('select');
										echo $this->loadTemplate('payment');
										$this->setLayout($previouslayout);
									} else {
										echo JHtml::_('link', JRoute::_('index.php?option=com_virtuemart&view=cart&task=editpayment', $this->useXHTML, $this->useSSL), $this->select_payment_text, 'class=""');
									}
								} else {
									echo vmText::_ ('COM_VIRTUEMART_CART_PAYMENT');
								} ?> </td>

						<?php } else { ?>
							<td colspan="1" style="align:left;vertical-align:top;" >
								<?php echo '<h4>'.vmText::_ ('COM_VIRTUEMART_CART_SELECTED_PAYMENT').'</h4>'; ?>
								<?php echo $this->cart->cartData['paymentName']; ?> </td>
						<?php } ?>
						<?php if (VmConfig::get ('show_tax')) { ?>
							<td align="right"><?php echo "<span  class='priceColor2'>" . $this->currencyDisplay->createPriceDiv ('paymentTax', '', $this->cart->cartPrices['paymentTax'], FALSE) . "</span>"; ?> </td>
						<?php } ?>
						<td align="right" ><?php if($this->cart->cartPrices['salesPricePayment'] < 0) echo $this->currencyDisplay->createPriceDiv ('salesPricePayment', '', $this->cart->cartPrices['salesPricePayment'], FALSE); ?></td>
						<td align="right" ><?php  echo $this->currencyDisplay->createPriceDiv ('salesPricePayment', '', $this->cart->cartPrices['salesPricePayment'], FALSE); ?> </td>
					</tr>
				<?php  } ?>
			</div>
			<div class="total_price">
				<h4><?php echo vmText::_ ('COM_VIRTUEMART_CART_TOTAL') ?></h4>
				<h3><?php echo $this->currencyDisplay->createPriceDiv ('billTotal', '', $this->cart->cartPrices['billTotal'], FALSE); ?></h3>
			</div>
		</div>
	</div>
</fieldset>
</div>
