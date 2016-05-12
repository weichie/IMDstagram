<?php

if(isset($_POST['register'])){
	$register_message = $app->registration($_POST['email'], $_POST['password']);
}
if(isset($_POST['login'])){
	$login_message = $app->login($_POST['email'], $_POST['password']);
}
if(isset($_POST['update'])){
	$update_message = $app->update_user($_POST['email'], $_POST['name'], $_POST['username'], $_POST['site'], $_POST['bio']);
}

?>