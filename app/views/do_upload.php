<?php
if( isset($_FILES['userfile']['name']) ){
	try {
		echo $this->upload( $_FILES['userfile'] );
	} catch (Exception $e){
		print_r($e);
	}
}

if( isset($_FILES['userfile_post']['name']) ){
	try {
		$post_image = $this->upload( $_FILES['userfile_post'] );

		echo $post_image;

		header('Location: ' . SITE_URL . '/?route=user/post&id='.$post_image);

	} catch (Exception $e){
		print_r($e);
	}
}

if( isset($_FILES['user_avatar']['name']) ){
	try {
		$post_image = $this->upload_avatar( $_FILES['user_avatar'] );

		header('Location: ' . SITE_URL . '/?route=user/edit_profile');

	} catch (Exception $e){
		print_r($e);
	}
}