<?php

	class Post extends Picture {

		public function post( $picture_id, $description, $filter ){

			$query = $this->db->query( 'UPDATE posts SET description="'.$description.'", date = NOW(), filter="'.$filter.'" WHERE id="'.$picture_id.'" AND user_id="'.$this->getUserID().'" ' );
			echo $query;

			if( $query ){
				return true;
			} else {
				trigger_error( $this->db->error );
				return false;
			}

		} 

		public function getPosts(){

			$query = $this->db->query( 'SELECT * FROM posts WHERE user_id="'.$this->getUserID().'"' );
			if( $query->num_rows > 0){
				$posts = array();

				while( $p = $query->fetch_assoc() ){
					$posts[] = $p;
				}

				return $posts;
			} else {
				return array();
			}

		}

		public function getFeed(){

		}

	}

?>