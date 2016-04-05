<?php
session_start();
$db = new mysqli('localhost', 'root', 'root', 'imdstagram');
// Autoload
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.class.php';
});

$app = new User;

if(isset($_POST['register'])){
	$app->registration($_POST['email'], $_POST['password']);
}
if(isset($_POST['login'])){
	$app->login($_POST['email'], $_POST['password']);
}

?>