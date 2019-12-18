<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$col= 1 ;
?>
<div class="vmgroup<?php echo $params->get( 'moduleclass_sfx' ) ?>">

<?php if ($headerText) : ?>
	<div class="vmheader"><?php echo $headerText ?></div>
<?php endif;
if ($display_style =="div") { ?>
	<div class="vmmanufacturer<?php echo $params->get('moduleclass_sfx'); ?> vs_clear">
	<?php foreach ($manufacturers as $manufacturer) {
		$manufacturerProductsURL = JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id, FALSE);
		//$link = JROUTE::_('index.php?option=com_virtuemart&view=manufacturer&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id);
		?>
		<div class="item" style="float:left;">
			<a href="<?php echo $manufacturerProductsURL; ?>">
		<?php
		if ($manufacturer->images && ($show == 'image' or $show == 'all' )) { ?>
			<img src="<?php echo $manufacturer->images[0]->file_url;?>" alt="">
		<?php
		}
		if ($show == 'text' or $show == 'all' ) { ?>
		 <div><?php echo $manufacturer->mf_name; ?></div>
		<?php
		} ?>
			</a>
		</div>
		<?php
		if ($col == $manufacturers_per_row) {
			$col= 1 ;
		} else {
			$col++;
		}
	} ?>
	</div>

<?php
} else {
	$last = count($manufacturers)-1;
?>

<ul class="vmmanufacturer<?php echo $params->get('moduleclass_sfx'); ?>">
<?php
foreach ($manufacturers as $manufacturer) {
	$link = JROUTE::_('index.php?option=com_virtuemart&view=manufacturer&virtuemart_manufacturer_id=' . $manufacturer->virtuemart_manufacturer_id);
	?>
	<li><a href="<?php echo $link; ?>">
		<?php
		if ($manufacturer->images && ($show == 'image' or $show == 'all' )) { ?>
			<?php echo $manufacturer->images[0]->displayMediaThumb('',false);?>
		<?php
		}
		if ($show == 'text' or $show == 'all' ) { ?>
		 <div><?php echo $manufacturer->mf_name; ?></div>
		<?php
		}
		?>
		</a>
	</li>
	<?php
	if ($col == $manufacturers_per_row && $manufacturers_per_row && $last) {
		echo '</ul><ul class="vmmanufacturer'.$params->get('moduleclass_sfx').'">';
		$col= 1 ;
	} else {
		$col++;
	}
	$last--;
} ?>
</ul>

<?php }
	if ($footerText) : ?>
	<div class="vmfooter<?php echo $params->get( 'moduleclass_sfx' ) ?>">
		 <?php echo $footerText ?>
	</div>
<?php endif; ?>
</div>
