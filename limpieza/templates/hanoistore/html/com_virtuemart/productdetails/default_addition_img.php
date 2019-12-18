<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Valerie Isaksen

 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default_images.php 7784 2014-03-25 00:18:44Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
?>
<div id="theCarousel" class="carousel slide multi-item-carousel" data-ride="carousel">
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<?php

		$start_image = VmConfig::get('add_img_main', 1) ? 0 : 1;

		$count = 0;
		for ($i = $start_image; $i < count($this->product->images); $i++) {
			$image = $this->product->images[$i];
			?>
			<div class="item <?php if($count==0) echo 'active';?>">
					<div class="col-sm-4">
						<?php
						if(VmConfig::get('add_img_main', 1)) {
							echo $image->displayMediaThumb('class="product-image" style="cursor: pointer"',false,$image->file_description);
							echo '<a href="'. $image->file_url .'"  class="product-image image-'. $i .'" style="display:none;" title="'. $image->file_meta .'" rel="vm-additional-images"></a>';
						} else {
							echo $image->displayMediaThumb("",true,"rel='vm-additional-images'",true,'');
						}
						?>
					</div>

			</div>
			<?php
			$count++;
		}
		?>
	</div>
	<!-- Left and right controls -->
	<a class="left carousel-control" href="#theCarousel" role="button" data-slide="prev">
		<i class="fa fa-angle-left"></i>
	</a>
	<a class="right carousel-control" href="#theCarousel" role="button" data-slide="next">
		<i class="fa fa-angle-right"></i>
	</a>

</div>
