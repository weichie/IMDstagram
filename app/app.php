<?php
ob_start();
session_start();
$db = new mysqli('localhost', 'root', 'root', 'imdstagram');

include 'config/config.php';

// Autoload
spl_autoload_register(function ($class_name) {
	include 'classes/'.$class_name . '.class.php';
});

// Start our app
$app = new User($db);

// Logic
include 'logic.php';

// We feed it our $app, and pages that are protected
$router = new Router( $app, array(
		'user/profile',
		'user/post',
		'user/feed',
		'user/do_upload',
		'user/edit_profile',
		'user/follow',
		'user/unfollow',
		'user/deletePost',
		'post/comment',
		'post/like'
	)
);

?>
