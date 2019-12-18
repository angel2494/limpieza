<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( 'JPATH_BASE' ) or die;

$ingredients = json_decode($displayData['params']->get('ingredients'));
$details_part = $ingredients->details_part;
if( count($details_part) > 0 ){
	?>
	<div class="ingredients">
		<h3 class="ingredients-title"><?php echo JText::_('CAKE_ART_INGREDIENTS_RECIPE'); ?></h3>
		<div class="content-container">
			<div class="list-ingredients">
				<?php
				foreach($details_part as $key=>$part) {
					?>
					<div class="ingredient">
						<input type="checkbox" name="checkbox" id="ingre-checkbox<?php echo ($key + 1); ?>">
						<label for="ingre-checkbox<?php echo ($key + 1); ?>"><?php echo $part; ?></label>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}