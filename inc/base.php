<?php
function check_https() {
	if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) {
		return 'https';
	}
	return 'http';
}

function app_url() {
	return check_https() . '://' . $_SERVER['HTTP_HOST'];
}

define('BASE_URL', app_url() . '/medical');
define('ADMIN_URL', BASE_URL . '/admin');

 ?>
