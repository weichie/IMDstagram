<?php

// Title OLD
/*if( isset($_GET['p']) ){
	switch($_GET['p']){
		case 'login':
			$title = 'Login';
		break;
		case 'register':
			$title = 'Register';
		break;
	}
}*/

// Normally we would get the title as a $title param

// Header
if( !isset($remove_header) ) {
	include_once('header.php');
}

// Page system OLD
/*if( isset($_GET['p']) ){
	// Later voor security checken
	/*$file = $_GET['p'].'.php';
	if( file_exists( $file ) ){*/
		//include $_GET['p'].'.php';
	/*} else {
		include 'login.php';
	}*//*
} else {
	include 'login.php';
}*/

// New Page System => Router
// We get the $view parameter here
if( isset($view) ){

	include $view.'.php';

}

// Footer
if( !isset($remove_footer) ) {
	include_once('footer.php');
}