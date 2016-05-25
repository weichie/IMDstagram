<?php

	class Post extends Picture {

		public function post( $picture_id, $description, $filter, $location ){

			$query = $this->db->query( 'UPDATE posts SET description="'.$this->db->real_escape_string($description).'", location="'.$this->db->real_escape_string($location).'", date = NOW(), filter="'.$this->db->real_escape_string($filter).'" WHERE id="'.$this->db->real_escape_string($picture_id).'" AND user_id="'.$this->getUserID().'" ' );

			if( $query ){
				return true;
			} else {
				trigger_error( $this->db->error );
				return false;
			}

		} 

		public function ago($time){
		   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		   $lengths = array("60","60","24","7","4.35","12","10");

		   $now = time();

		       $difference     = $now - $time;
		       $tense         = "ago";

		   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		       $difference /= $lengths[$j];
		   }

		   $difference = round($difference);

		   if($difference != 1) {
		       $periods[$j].= "s";
		   }

		   return "$difference $periods[$j] ago ";
		}

		public function linkHashtags($text){

			preg_match_all("/(#\w+)/", $text, $matches);

			foreach($matches[0] as $hashtag){
				$text = str_replace($hashtag, '<a href="'.SITE_URL.'/?route=user/search&q='.str_replace('#','',$hashtag).'">'.$hashtag.'</a>', $text);
			}

			return $text;

		}

		public function getPost($id){

			$query = $this->db->query('SELECT *, posts.id AS post_id FROM posts INNER JOIN users ON (posts.user_id = users.id) WHERE posts.id = "'.$this->db->real_escape_string($id).'"');
			$fetch = $query->fetch_assoc();

			if( $query ){

				$fetch['comments'] = $this->getComments($fetch['post_id']);

				return $fetch;
			} else {
				trigger_error( $this->db->error );
				return false;
			}

		}

		public function getPosts($id=null){

			if( !$id ){
				$id = $this->getUserID();
			}

			$query = $this->db->query( 'SELECT * FROM posts WHERE user_id="'.$this->db->real_escape_string($id).'"' );
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

		public function getTotalPosts($id=null){

			if( !$id ){
				$id = $this->getUserID();
			}

			$query = $this->db->query('SELECT count(posts.id) AS count FROM posts WHERE user_id="'.$this->db->real_escape_string($id).'"');
			$fetch = $query->fetch_assoc();
			return $fetch['count'];
		}

		public function deletePost($id){
			global $db;
			$user_id = $this->getUserID();

			$query = $this->db->query('DELETE FROM posts WHERE id="'.$this->db->real_escape_string($id).'" AND user_id="'.$this->db->real_escape_string($user_id).'"');

			if( $query ){
				return true;
			} else {
				trigger_error( $this->db->error );
				return false;
			}
		}

		public function likePost($id){

			$user_id = $this->getUserID();
			$post_id = $id;

			$query = $this->db->query("INSERT INTO likes(user_id, post_id) VALUES ('".$this->db->real_escape_string($user_id)."','".$this->db->real_escape_string($post_id)."');");

			if( $query ){
				return true;
			} else {
				trigger_error( $this->db->error );
				return false;
			}
		}

		public function unlikePost($id){
			$user_id = $this->getUserID();
			$post_id = $id;

			$query = $this->db->query("DELETE FROM likes WHERE user_id='".$this->db->real_escape_string($user_id)."' AND post_id='".$this->db->real_escape_string($post_id)."'");

			if( $query ){
				return true;
			} else {
				trigger_error( $this->db->error );
				return false;
			}
		}

		public function getFeed(){



			$getFeed = $this->db->query('SELECT *,posts.id AS post_id, posts.location AS post_location FROM posts 
										 LEFT JOIN followers ON (posts.user_id = followers.follower_id)
										 INNER JOIN users ON (posts.user_id = users.id)
										 WHERE (followers.user_id="'.$this->getUserID().'" OR posts.user_id="'.$this->getUserID().'")
										 AND report < 3
										 ORDER BY posts.date DESC');

			/*echo 'SELECT DISTINCT *,posts.id AS post_id, posts.location AS post_location FROM posts 
										 LEFT JOIN followers ON (posts.user_id = followers.follower_id)
										 INNER JOIN users ON (posts.user_id = users.id)
										 WHERE (followers.user_id="'.$this->getUserID().'" OR posts.user_id="'.$this->getUserID().'")
										 AND report < 3
										 ORDER BY posts.date DESC';*/


			// Get posts from following and your own.

			if( $getFeed->num_rows ){
				$feed = array();
				$f = array();
				while($f = $getFeed->fetch_assoc()){

					$f['comments'] = $this->getComments($f['post_id'], 3);
					$feed[] = $f;

				}

				return $feed;
			} else {
				return false;
			}
		}

		public function hasLiked($id){

			$query = $this->db->query('SELECT * FROM likes WHERE user_id="'.$this->getUserID().'" AND post_id="'.$this->db->real_escape_string($id).'"');

			if( $query->num_rows ){
				return true;
			} else {
				return false;
			}

		}

		public function getComments($id, $max=null){

			$limit = (isset($max)) ? 'LIMIT ' . $max : '';

			$getComments = $this->db->query('SELECT * FROM comments INNER JOIN users ON (comments.user_id = users.id) WHERE comments.post_id = "'.$this->db->real_escape_string($id).'" ORDER BY date DESC ' . $limit);
			
			//echo 'SELECT * FROM comments INNER JOIN users ON (comments.user_id = users.id) WHERE comments.post_id = "'.$this->db->real_escape_string($id).'" ' . $limit;

			if( $getComments->num_rows ){

				$comments = array();
				while( $c = $getComments->fetch_assoc() ){
					$comments[] = $c;
				}

				return $comments;

			} else {
				return false;
			}

		}

		public function search($q){

			if( empty($q) ){
				return $results = array();
			}

			$query_posts = $this->db->query('SELECT DISTINCT * FROM posts WHERE description LIKE "%'.$this->db->real_escape_string($q).'%"');
			$query_users = $this->db->query('SELECT DISTINCT * FROM users WHERE private="0" AND username LIKE "%'.$this->db->real_escape_string($q).'%"');

			$results = array();

			if( $query_posts->num_rows > 0 ){

				while( $p = $query_posts->fetch_assoc() ){
					$results['posts'][] = $p;
				}

			}

			if( $query_users->num_rows > 0 ){

				while( $u = $query_users->fetch_assoc() ){
					$results['users'][] = $u;
				}

			}

			return $results;

		}



	}

?>