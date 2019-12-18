<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( 'JPATH_BASE' ) or die;

?>
<li class="createdby" itemprop="author" itemscope itemtype="http://schema.org/Person">
	<!--	<i class="fa fa-user"></i>-->
	<span>By </span>
	<?php $author = ( $displayData['item']->created_by_alias ? $displayData['item']->created_by_alias : $displayData['item']->author ); ?>
	<?php $author = '<span class="author_post" itemprop="name" data-toggle="tooltip" title="' . JText::sprintf( 'COM_CONTENT_WRITTEN_BY', '' ) . '">' . $author . '</span>'; ?>

		<?php
		//echo JHtml::_( 'link', '', $author, array( 'itemprop' => 'url' ) );
		echo $author;
		?>

</li>