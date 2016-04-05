<?php

// Autoload
spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name . '.class.php';
});

$app = new User;

?>