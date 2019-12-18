<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

JHtml::_('bootstrap.framework');

$canEdit = $displayData['params']->get('access-edit');

?>

<div class="icons">
	<?php if ($displayData['params']->get('show_print_icon')) : ?>
		<?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?>
	<?php endif; ?>
	<?php if ($displayData['params']->get('show_email_icon')) : ?>
		<?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?>
	<?php endif; ?>
</div>