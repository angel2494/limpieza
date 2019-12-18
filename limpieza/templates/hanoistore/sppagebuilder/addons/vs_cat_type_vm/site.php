<?php
defined( '_JEXEC' ) or die( 'resticted aceess' );
AddonParser::addAddon( 'sp_vs_cat_vm', 'sp_vs_cat_vm_addon' );
AddonParser::addAddon( 'sp_vs_cat_vm_item', 'sp_vs_cat_vm_item_addon' );
function sp_vs_cat_vm_addon( $atts, $content ) {
	$cat = 0;
	extract( spAddonAtts( array(
		'title' => '',
		'style' => '',
		'number' => 0,
		'cat' => 0,
		'position_banner' => '',
	), $atts ) );
	defined('DS') or define('DS', DIRECTORY_SEPARATOR);
	if (!class_exists( 'VmConfig' )) require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers'.DS.'config.php');
	if (!class_exists('CurrencyDisplay'))
		require(JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_virtuemart'.DS.'helpers' . DS . 'currencydisplay.php');
	$currency = CurrencyDisplay::getInstance( );
	VmConfig::loadConfig();
	VmConfig::loadJLang('mod_virtuemart_product', true);
	$mainframe = Jfactory::getApplication();
	$virtuemart_currency_id = $mainframe->getUserStateFromRequest( "virtuemart_currency_id", 'virtuemart_currency_id',vRequest::getInt('virtuemart_currency_id',0) );

	vmJsApi::jPrice();
	vmJsApi::cssSite();
	echo vmJsApi::writeJS();
	$productModel = VmModel::getModel('Product');
	$products = $productModel->getProductListing('latest', $number, true, true, false, true, $cat);
	$products2 = $productModel->getProductListing('featured', $number, true, true, false, true, $cat);
	$products3 = $productModel->getProductListing('topten', $number, true, true, false, true, $cat);
	$products4 = $productModel->getProductListing('recent', $number, true, true, false, true, $cat);
	ob_start();
	$int_rand = rand(1,1000);
	$int_rand1 = rand(1,1000);
	$int_rand2 = rand(1,1000);
	$int_rand3 = rand(1,1000);
	$int_rand4 = rand(1,1000);
	?>
	<div class="addon_products">
		<div class="tabs">
			<h2 class="title_type"><?php echo $title;?></h2>
			<ul class="tab">
				<li rel="latest<?php echo $int_rand;?>"><a class="active" href="">Latest</a></li>
				<li rel="featured<?php echo $int_rand;?>"><a href="">Featured</a></li>
				<li rel="topten<?php echo $int_rand;?>"><a href="">Topten</a></li>
				<li rel="recent<?php echo $int_rand;?>"><a href="">Recent</a></li>
				<li rel="latest<?php echo $int_rand;?>"><a href="">Sales</a></li>
			</ul>
			<div class="vs_clear"></div>
			<div class="content_tab">
				<div class="item_tab latest<?php echo $int_rand;?> active">
					<div class="grid_products vs_clear">
						<div class="ads <?php echo $position_banner;?>">
							<div id="myAds<?php echo $int_rand1;?>" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
									<?php
									preg_match_all('/\[[^\]]*\]/i', $content, $matches);
									if (isset($matches[0]) && count($matches[0] > 0)) {
										$i=0;
										foreach ($matches[0] as $item) {
											$cls = '';
											if($i==0) $cls = ' active';
											echo '<div class="item '.$cls.'">';
											echo AddonParser::spDoAddon($item);
											echo '</div>';
											$i++;
										}
									}
									?>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myAds<?php echo $int_rand1;?>" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myAds<?php echo $int_rand1;?>" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<?php if($style=='style-1') {?>
						<div class="items">
							<?php }?>
							<?php
							if(count($products)) {
								$productModel->addImages($products);
								for ($i = 0; $i < count($products); $i++) { ?>
									<div class="product vm-col vm-col-3">
										<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon', array('product' => $products[$i], 'showRating' => 1)); ?>
									</div>
								<?php }
							}?>
						<?php if($style=='style-1') {?>
						</div>
						<?php }?>
					</div>
				</div>
				<div class="item_tab featured<?php echo $int_rand;?>">
					<div class="grid_products vs_clear">
						<div class="ads <?php echo $position_banner;?>">
							<div id="myAds<?php echo $int_rand2;?>" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
									<?php
									preg_match_all('/\[[^\]]*\]/i', $content, $matches);
									if (isset($matches[0]) && count($matches[0] > 0)) {
										$i=0;
										foreach ($matches[0] as $item) {
											$cls = '';
											if($i==0) $cls = ' active';
											echo '<div class="item '.$cls.'">';
											echo AddonParser::spDoAddon($item);
											echo '</div>';
											$i++;
										}
									}
									?>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myAds<?php echo $int_rand2;?>" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myAds<?php echo $int_rand2;?>" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<?php if($style=='style-1') {?>
						<div class="items">
							<?php }?>
							<?php
							if(count($products2)) {
								$productModel->addImages($products2);
								for ($i = 0; $i < count($products2); $i++) { ?>
									<div class="product vm-col vm-col-3">
										<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon', array('product' => $products2[$i], 'showRating' => 1)); ?>
									</div>
								<?php }
							}?>
							<?php if($style=='style-1') {?>
						</div>
					<?php }?>
					</div>
				</div>
				<div class="item_tab topten<?php echo $int_rand;?>">
					<div class="grid_products vs_clear">
						<div class="ads <?php echo $position_banner;?>">
							<div id="myAds<?php echo $int_rand3;?>" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
									<?php
									preg_match_all('/\[[^\]]*\]/i', $content, $matches);
									if (isset($matches[0]) && count($matches[0] > 0)) {
										$i=0;
										foreach ($matches[0] as $item) {
											$cls = '';
											if($i==0) $cls = ' active';
											echo '<div class="item '.$cls.'">';
											echo AddonParser::spDoAddon($item);
											echo '</div>';
											$i++;
										}
									}
									?>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myAds<?php echo $int_rand3;?>" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myAds<?php echo $int_rand3;?>" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<?php if($style=='style-1') {?>
						<div class="items">
							<?php }?>
							<?php
							if(count($products3)) {
								$productModel->addImages($products3);
								for ($i = 0; $i < count($products3); $i++) { ?>
									<div class="product vm-col vm-col-3">
										<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon', array('product' => $products3[$i], 'showRating' => 1)); ?>
									</div>
								<?php }
							}?>
							<?php if($style=='style-1') {?>
						</div>
					<?php }?>
					</div>
				</div>
				<div class="item_tab recent<?php echo $int_rand;?>">
					<div class="grid_products vs_clear">
						<div class="ads <?php echo $position_banner;?>">
							<div id="myAds<?php echo $int_rand4;?>" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner" role="listbox">
									<?php
									preg_match_all('/\[[^\]]*\]/i', $content, $matches);
									if (isset($matches[0]) && count($matches[0] > 0)) {
										$i=0;
										foreach ($matches[0] as $item) {
											$cls = '';
											if($i==0) $cls = ' active';
											echo '<div class="item '.$cls.'">';
											echo AddonParser::spDoAddon($item);
											echo '</div>';
											$i++;
										}
									}
									?>
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myAds<?php echo $int_rand4;?>" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myAds<?php echo $int_rand4;?>" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<?php if($style=='style-1') {?>
						<div class="items">
							<?php }?>
							<?php
							if(count($products4)) {
								$productModel->addImages($products4);
								for ($i = 0; $i < count($products4); $i++) { ?>
									<div class="product vm-col vm-col-3">
										<?php echo shopFunctionsF::renderVmSubLayout('vs_grid_icon', array('product' => $products4[$i], 'showRating' => 1)); ?>
									</div>
								<?php }
							}?>
							<?php if($style=='style-1') {?>
						</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$html = ob_get_clean();
	return $html;
}
function sp_vs_cat_vm_item_addon( $atts ){
	extract(spAddonAtts(array(
		"image"=>'',
	), $atts));
	ob_start();
	?>

		<img src="<?php echo $image;?>" alt="">

	<?php
	$html = ob_get_clean();
	return $html;
}