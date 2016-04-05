<?php

// Autoload
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.class.php';
});

$db = new mysqli_connect('localhost', 'root', 'root', 'imdstagram');
$app = new User;

?>