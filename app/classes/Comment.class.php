<?php

	class Comment extends Hash {

		public function postComment($id, $comment, $ajax=null){

			$postComment = $this->db->query('INSERT INTO comments (post_id, user_id, comment, date) VALUES
			("'.$this->db->real_escape_string($id).'", "'.$this->getUserID().'", "'.htmlentities($comment, ENT_QUOTES).'", NOW())');

			if( $postComment === true ){
				if( !$ajax ){
					header('Location: ' . SITE_URL . '/?route=user/view_post&id='.$id);
				}
				return true;
			} else {
				trigger_error($this->db->error);
				return false;
			}

		}

	}

?>