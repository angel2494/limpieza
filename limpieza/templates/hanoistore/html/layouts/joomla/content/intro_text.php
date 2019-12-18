<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;
$params = $displayData->params;//echo'<pre>';print_r($displayData);die;
$intro_text = $displayData->introtext;
$regex = '/\[ob_countdown[^\]]*\]/ui';
preg_match_all( $regex, $intro_text, $matches );//echo'<pre>';print_r($matches);die;
$intro_text = preg_replace( $regex, '', $intro_text );
$new_format_date = '';
if ( isset($matches[0][0]) ) {
	preg_match('/date="([^"]*)"/ui', $matches[0][0], $date_info);
	if ( isset( $date_info[1] ) ) {
		$date_begin = strtotime( $date_info[1] );
		$date     = JFactory::getDate($date_begin);
		$new_format_date = $date->format( 'H:i A l - j F Y' );
	}
}

?>
<div class="content-item">
	<h3><a href="<?php echo JRoute::_( ContentHelperRoute::getArticleRoute( $displayData->slug, $displayData->catid, $displayData->language ) ); ?>" rel="bookmark"><?php echo htmlspecialchars( $displayData->title ); ?></a></h3>
	<?php echo mb_substr($intro_text, 0, 150); ?>
	<?php if ( $new_format_date != '' ) { ?>
	<p><strong><?php echo $new_format_date; ?></strong></p>
	<?php } ?>
	<a class="view-detail" href="<?php echo JRoute::_( ContentHelperRoute::getArticleRoute( $displayData->slug, $displayData->catid, $displayData->language ) ); ?>">view detail</a>
</div>
<?php if( count ( $matches[0] ) > 0 ) { ?>
<div class="content-right">
	<?php foreach ( $matches[0] as $match ) {
		echo $match;
	}?>
</div>
<?php } ?>