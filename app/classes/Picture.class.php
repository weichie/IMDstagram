<?php

	class Picture extends Comment {

		public function upload($file){

			$uploaddir = 'uploads/';
			$uploadfile = $uploaddir . basename($file['name']);

			if( move_uploaded_file($file['tmp_name'], $uploadfile) ){
				return true;
			} else {
				throw new Exception('Couldn\'t upload image');
			}

		}

	}

?>