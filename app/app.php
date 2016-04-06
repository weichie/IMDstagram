<?php
ob_start();
session_start();
$db = new mysqli('localhost', 'root', 'root', 'imdstagram');

include 'config.php';

// Autoload
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.class.php';
});

// Start our app
$app = new User;

// Logic
if(isset($_POST['register'])){
	$app->registration($_POST['email'], $_POST['password']);
}
if(isset($_POST['login'])){
	$app->login($_POST['email'], $_POST['password']);
}

// Secure pages
$app->auth($_GET['p'], 
	array(
		'profile'
	)
);

// Load base view.
include 'views/base.php';

?>
