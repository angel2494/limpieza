<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( 'JPATH_BASE' ) or die;

$instruction = json_decode($displayData['params']->get('instruction'));
$step_details = $instruction->step_details;
if( count($step_details) > 0 ){
	foreach($step_details as $key=>$step) {
		?>
		<div class="step">
			<input type="checkbox" name="checkbox" id="step-checkbox<?php echo ($key + 1); ?>">
			<label for="step-checkbox<?php echo ($key + 1); ?>"><?php echo JText::_('CAKE_ART_STEP') . ' ' . ($key + 1); ?></label>
			<p><?php echo $step; ?></p>
		</div>
		<?php
	}
}
