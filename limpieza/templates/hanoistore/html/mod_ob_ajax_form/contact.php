<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    1/23/16 12:29 PM
 * Author     foobla | noreply@foobla.com | http://foobla.com
 * Copyright  Copyright (C) 2016 betweenbrain llc. All Rights Reserved.
 * License    GNU General Public License version 2, or later.
 */

?>
<?php
//var_dump($params);
//var_dump($params->get('type'));
$arr_type = $params->get('type');
?>
<div class="ob_ajax_form">
	<form class="form-request form-request_mod-a ui-form block_right_pad" action="#" method="post">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<input class="form-control required" name="name" type="text" placeholder="Name">
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<input class="form-control required" name="email" type="email" placeholder="Email">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<input class="form-control" name="phone" type="text" placeholder="Phone">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<input class="form-control required" name="subject" type="text" placeholder="Subject">
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<textarea class="required" placeholder="Message" name="message"></textarea>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<input type="submit" value="Send Message">
			</div>
		</div>
		<div class="row">
			<div class="message"></div>
		</div>
	</form>
</div>
