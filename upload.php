<?php
include 'app/app.php';

if( isset($_FILES['userfile']['name']) ){
	try {
		print_r($_FILES['userfile']['name']);
		$app->upload( $_FILES['userfile'] );

		header('Location: ' . SITE_URL);

	} catch (Exception $e){
		print_r($e);
	}
}

?>