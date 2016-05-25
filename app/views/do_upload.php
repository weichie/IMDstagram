<?php
if( isset($_FILES['userfile']['name']) ){

	try {
		echo $this->upload( $_FILES['userfile'] );
	} catch (Exception $e){
		print_r($e);
	}
}

if( isset($_FILES['userfile_post']['name']) ){

	//$check = getimagesize($_FILES['userfile_post']['name']);

	//if( $check !== false){
		try {
			$post_image = $this->upload( $_FILES['userfile_post'] );

			echo $post_image;

			header('Location: ' . SITE_URL . '/?route=user/post&id='.$post_image);

		} catch (Exception $e){
			//print_r($e);
			?>
			<div class="alert alert-warning">
				<?php echo htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
			</div>
			<?php
		}
	/*} else {
		header('Location: ' . SITE_URL . '/?route=user/post');
	}*/
}

if( isset($_FILES['user_avatar']['name']) ){

	/*$check = getimagesize($_FILES['user_avatar']['name']);

	if( $check !== false){*/

		try {
			$post_image = $this->upload_avatar( $_FILES['user_avatar'] );

			header('Location: ' . SITE_URL . '/?route=user/edit_profile');

		} catch (Exception $e){
			print_r($e);
		}

	/*} else {
		header('Location: ' . SITE_URL . '/?route=user/post');
	}*/
}