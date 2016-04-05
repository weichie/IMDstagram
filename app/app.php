<?php
ob_start();

// Autoload
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.class.php';
});

define('SITE_URL', '/imdstagram');

$db = new mysqli('localhost', 'root', 'root', 'imdstagram');
$app = new User;

?>