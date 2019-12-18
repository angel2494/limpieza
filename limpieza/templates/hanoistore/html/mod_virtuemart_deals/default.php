<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
// add javascript for price and cart, need even for quantity buttons, so we need it almost anywhere
//var_dump($currency);die();
$time_now = $date = date('Y-m-d H:i:s');
$int_rand = rand(1,1000);
?>
<div class="list_deals">
	<div class="grid_products">
		<div class="slider">
			<?php
			for( $i=0; $i< count($product_ids); $i++ ) {
				?>
				<?php
				$product =  $productModel->getProduct($product_ids[$i]);
				$productModel->addImages($product);
				if (!empty($product->images[0])) {
					$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage" border="0"', FALSE);
					$image_full = $product->images[0]->displayMediaFull();
				} else {
					$image = '';
				}
				$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id);
				?>
				<div class="item">
					<div class="inner">
						<div class="thumb">
							<a href="<?php echo $url;?>">
								<?php echo $image;?>
								<div class="hover">
									<?php
									if (!empty($product->images[1])) {
										$image_1 = $product->images[1]->displayMediaThumb ('class="featuredProductImage"', FALSE);
										echo $image_1;
									}
									?>
								</div>
							</a>
						</div>
						<?php if($product->prices['product_price_publish_down'] && $product->prices['product_price_publish_down'] != null){ ?>
							<div class="deals" data-deals="<?php echo $product->prices['product_price_publish_down'];?>">

							</div>
						<?php }	?>
						<h3><a href="<?php echo $url;?>"><?php echo $product->product_name ?></a></h3>
						<div class="star-rating">
							<?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>1,'product'=>$product)); ?>
						</div>
						<div class="vs_price">
							<?php echo shopFunctionsF::renderVmSubLayout('vs_price',array('product'=>$product,'currency'=>$currency,'element'=>'span')); ?>
						</div>
						<div class="add_cart item_action">
							<?php echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'row'=>0,'show_qty'=>false)); ?>
						</div>
						<div class="quick_view item_action">
							<a data-toggle="modal" data-target="#productCat<?php echo $product->virtuemart_product_id;?>"><i class="zmdi zmdi-plus zmdi-hc-fw"></i>  <?php echo JText::_('VS_QUICKVIEW');?></a>
						</div>
						<!-- Modal -->
						<div id="productCat<?php echo $product->virtuemart_product_id;?>" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<?php echo shopFunctionsF::renderVmSubLayout('vs_lightbox',array('product'=>$product,'currency'=>$currency)); ?>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<script type="text/javascript">

	jQuery(document).ready(function ($) {
		$.noConflict();
		function mktime(time){
			var array_time = time.split(' ');
			var array_year = array_time[0].split('-');
			var array_minus = array_time[1].split(':');
			a=new Date()
			a.setHours(array_minus[0]);
			a.setSeconds(array_minus[2]);
			a.setMinutes(array_minus[1]);
			a.setDate(array_year[2]);
			a.setYear(array_year[0]);
			a.setMonth(array_year[1]);
			return a.getTime();
		}
		var array_time = new Array();
		var time_now = mktime('<?php echo $time_now;?>');
		var i = 0;
		$(".list_deals .item").each(function(){
			var mk_time = $(this).find('.deals').attr('data-deals');
			if(typeof mk_time != 'undefined'){
			array_time[i] = mktime(mk_time);
			var minutes = 1000 * 60;
			var hours = minutes * 60;
			var days = hours * 24;
			var years = days * 365;
			var html_day = parseInt((parseInt(array_time[i]) - parseInt(time_now))/days);
			var html_hours =  parseInt((parseInt(array_time[i]) - parseInt(time_now) - html_day*days)/hours);
			var html_minus = parseInt((parseInt(array_time[i]) - parseInt(time_now) - html_day*days - html_hours*hours)/minutes);
			var html_seconds =  parseInt((parseInt(array_time[i]) - parseInt(time_now) - html_day*days - html_hours*hours - html_minus*minutes)/1000);
			$(this).find('.deals').html('<div class="deals_day">'+(html_day)+'<p>Days</p></div><div class="deals_day">'+html_hours+'<p>Hours</p></div><div class="deals_day">'+html_minus+'<p>Mins</p></div><div class="deals_day">'+html_seconds+'<p>Secs</p></div>');
			i++;
			}
		});

		setInterval(function(){
			time_now = time_now + 1000;
			var i = 0;
			$(".list_deals .item").each(function(){
				var minutes = 1000 * 60;
				var hours = minutes * 60;
				var days = hours * 24;
				var years = days * 365;
				var html_day = parseInt((parseInt(array_time[i]) - parseInt(time_now))/days);
				var html_hours =  parseInt((parseInt(array_time[i]) - parseInt(time_now) - html_day*days)/hours);
				var html_minus = parseInt((parseInt(array_time[i]) - parseInt(time_now) - html_day*days - html_hours*hours)/minutes);
				var html_seconds =  parseInt((parseInt(array_time[i]) - parseInt(time_now) - html_day*days - html_hours*hours - html_minus*minutes)/1000);
				$(this).find('.deals').find('.deals_day').eq(0).html(html_day + '<p>Days</p>');
				$(this).find('.deals').find('.deals_day').eq(1).html(html_hours + '<p>Hours</p>');
				$(this).find('.deals').find('.deals_day').eq(2).html(html_minus + '<p>Mins</p>');
				$(this).find('.deals').find('.deals_day').eq(3).html(html_seconds + '<p>Secs</p>');
				i++;
			});
		}, 1000);
	});
</script>