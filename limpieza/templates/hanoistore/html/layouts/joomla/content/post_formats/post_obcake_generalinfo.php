<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( 'JPATH_BASE' ) or die;

$prep_time = json_decode($displayData['params']->get('prep_time'));
$cook_time = json_decode($displayData['params']->get('cook_time'));
$yield = json_decode($displayData['params']->get('yield'));
$servings = json_decode($displayData['params']->get('servings'));
$prep_time_label = $prep_time->prep_time_label[0];
$cook_time_label = $cook_time->cook_time_label[0];
$yield_label = $yield->yield_label[0];
$servings_label = $servings->servings_label[0];
?>
<div class="recipe-detail-other">
	<div class="row">
		<?php
		if($prep_time_label != ''){
			?>
			<div class="col-md-3 col-sm-3 col-xs-6 recipe-detail-component">
				<div class="col-md-4">
					<img src="<?php echo $prep_time->prep_time_img[0]; ?>" alt="recipe detail">
				</div>
				<div class="col-md-8">
					<em><?php echo $prep_time_label; ?></em>
					<p class="detail-info"><?php echo $prep_time->prep_time_content[0]; ?></p>
				</div>
			</div>
			<?php
		}
		if($cook_time_label != ''){
			?>
			<div class="col-md-3 col-sm-3 col-xs-6 recipe-detail-component">
				<div class="col-md-4">
					<img src="<?php echo $cook_time->cook_time_img[0]; ?>" alt="recipe detail">
				</div>
				<div class="col-md-8">
					<em><?php echo $cook_time_label; ?></em>
					<p class="detail-info"><?php echo $cook_time->cook_time_content[0]; ?></p>
				</div>
			</div>
			<?php
		}
		if($yield_label != ''){
			?>
			<div class="col-md-3 col-sm-3 col-xs-6 recipe-detail-component">
				<div class="col-md-4">
					<img src="<?php echo $yield->yield_img[0]; ?>" alt="recipe detail">
				</div>
				<div class="col-md-8">
					<em><?php echo $yield_label; ?></em>
					<p class="detail-info"><?php echo $yield->yield_content[0]; ?></p>
				</div>
			</div>
			<?php
		}
		if($servings_label != ''){
			?>
			<div class="col-md-3 col-sm-3 col-xs-6 recipe-detail-component">
				<div class="col-md-4">
					<img src="<?php echo $servings->servings_img[0]; ?>" alt="recipe detail">
				</div>
				<div class="col-md-8">
					<em><?php echo $servings_label; ?></em>
					<p class="detail-info"><?php echo $servings->servings_content[0]; ?></p>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>