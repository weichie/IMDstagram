<?php

// Title
if( isset($_GET['p']) ){
	switch($_GET['p']){
		case 'login':
			$title = 'Login';
		break;
		case 'register':
			$title = 'Register';
		break;
	}
}

// Header
include_once('header.php');

// Page system
if( isset($_GET['p']) ){
	// Later voor security checken
	/*$file = $_GET['p'].'.php';
	if( file_exists( $file ) ){*/
		include $_GET['p'].'.php';
	/*} else {
		include 'login.php';
	}*/
} else {
	include 'login.php';
}

// Footer
include_once('footer.php');