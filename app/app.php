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

// We feed it our $app
$router = new Router( $app );

// Load base view.
/*include 'views/base.php';*/

?>
