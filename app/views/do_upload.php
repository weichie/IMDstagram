<?php
if( isset($_FILES['userfile']['name']) ){
	try {
		echo $app->upload( $_FILES['userfile'] );
	} catch (Exception $e){
		print_r($e);
	}
}

if( isset($_FILES['userfile_post']['name']) ){
	try {
		$post_image = $app->upload( $_FILES['userfile_post'] );

		echo $post_image;

		header('Location: ' . SITE_URL . '/?p=post&id='.$post_image);;

	} catch (Exception $e){
		print_r($e);
	}
}
