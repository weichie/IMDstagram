<?php

	class Picture extends Comment {

		// Do one thing only, and that is upload a file/picture!
		public function upload($file){
			global $db;

			$uploaddir = 'uploads/';
			$uploadfile = $uploaddir . basename($file['name']);

  			$ext = substr($file['name'], strrpos($file['name'], '.') + 1);

  			if (($ext == "jpg" || $ext == "png" || $ext == "jpeg") && 
    		($_FILES["uploaded_file"]["size"] < 80000)) {
			
				if( move_uploaded_file($file['tmp_name'], $uploadfile) ){
					// Success
					if( $db->query('INSERT INTO posts (image_url,user_id,date) VALUES ("'.$uploadfile.'", "'.$this->getUserID().'",NOW())') === true ){

						return $db->insert_id;

					} else {
						throw new Exception('Couldn\'t upload image');
					}
				} else {
					throw new Exception('Couldn\'t upload image');
				}
			} else {
				throw new Exception('Couldn\'t upload image: Only use JPG or PNG');
			}
		}

		/*
		if($post['type'] == 'post'){

			$db->query('INSERT INTO posts (image_url, description, user_id, date) 
						VALUES ("'.$uploadfile.'", "'.$_POST['description'].'", "'.$this->getUserID().'", NOW())');

		}*/

	}

?>