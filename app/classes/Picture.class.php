<?php

	class Picture extends Comment {

		// Do one thing only, and that is upload a file/picture!
		public function upload($file){
			global $db;

			$uploaddir = 'uploads/';
			$uploadfile = $uploaddir . basename($file['name']);

			// Todo => File validation

			if( move_uploaded_file($file['tmp_name'], $uploadfile) ){

				// Success
				if( $db->query('INSERT INTO posts (image_url,user_id,date) VALUES ("'.$uploadfile.'", "'.$this->getUserID().'",NOW())') === true ){

					return $db->insert_id;

				} else {
					// TODO
					// ERROR STUFF
				}

			} else {
				throw new Exception('Couldn\'t upload image');
			}

		}

		/*
		if($post['type'] == 'post'){

			$db->query('INSERT INTO posts (image_url, description, user_id, date) 
						VALUES ("'.$uploadfile.'", "'.$_POST['description'].'", "'.$this->getUserID().'", NOW())');

		}*/

	}

?>