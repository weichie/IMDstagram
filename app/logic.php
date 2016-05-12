<?php

if(isset($_POST['register'])){
	$register_message = $app->registration($_POST['email'], $_POST['password']);
}
if(isset($_POST['login'])){
	$login_message = $app->login($_POST['email'], $_POST['password']);
}

?>