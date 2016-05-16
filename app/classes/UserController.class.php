<?php

class UserController {

	protected $app;

	public function __construct($app){
		$this->app = $app;
	}

	// Basic 
	public function base(){
		
		$this->app->view('login');

	}

	public function login(){

		$this->app->view('login');

	}

	public function profile(){

		if( isset($_GET['id'] ) ){
			$id = $_GET['id'];
		}

		$posts = $this->app->getPosts($id);
		$bio = $this->app->getBio($id);

		$this->app->view('profile', array(
				'posts' => $posts,
				'bio' => $bio,
				'total_posts' => $this->app->getTotalPosts($id),
				'followers' => $this->app->getTotalFollowers($id),
				'following' => $this->app->getTotalFollowing($id),
			)
		);

	}

	public function feed(){

		$this->app->view('feed');

	}

	public function post(){

		if( isset($_GET['id']) ){

			// Misschien moet die een Picture functie zijn? 
			// Picture object returnen 
			$getPicture = $this->app->db->query('SELECT * FROM posts WHERE id="'.$_GET['id'].'"');
			if( $getPicture ){

				$getPicture = $getPicture->fetch_assoc();
				$picture 	= $getPicture['image_url'];
				$id 		= $getPicture['id'];

			}

			// Give our view the picture :)
			$this->app->view('post', array(
					'picture' => $picture,
					'id' => $id
				)
			);

		}

		if( isset($_POST['post_id']) ){
			
			$post = $this->app->post( $_POST['post_id'], $_POST['beschrijving'], $_POST['filter'] );

			if( $post ){
				header('Location: ' . SITE_URL . '/?route=user/profile');
			}

		}

		$this->app->view('post');

	}

	public function do_upload(){

		$this->app->view('do_upload');

	}

	public function edit_profile(){

		if(isset($_POST['update'])){
			$update_message = $this->app->update_user($_POST['email'], $_POST['name'], $_POST['username'], $_POST['site'], $_POST['bio'], $_POST['private']);
		
			$bio = $this->app->getBio();

			$this->app->view('edit_profile', array(
					'update_message' => $update_message,
					'bio' => $bio,
					'total_posts' => $this->app->getTotalPosts(),
					'followers' => $this->app->getTotalFollowers(),
					'following' => $this->app->getTotalFollowing(),
				)
			);
		} else {

			$bio = $this->app->getBio();

			$this->app->view('edit_profile', array(
					'bio' => $bio,
					'total_posts' => $this->app->getTotalPosts(),
					'followers' => $this->app->getTotalFollowers(),
					'following' => $this->app->getTotalFollowing(),
				)
			);

		}

	}

	public function view_post(){

		if( !isset($_GET['id']) ){
			header('Location:' . SITE_URL);
		}

		$post = $this->app->getPost($_GET['id']);

		$this->app->view('view_post', array(
				'post' => $post
			)
		);

	}

	public function search(){

		$q = htmlentities($_GET['q'], ENT_QUOTES);

		$results = $this->app->search($q);

		$this->app->view('search', array(
				'q' => $q,
				'results' => $results
			)
		);

	}

	public function follow(){

		$id = htmlentities($_GET['id'], ENT_QUOTES);

		$follow = $this->app->follow($id);

		$this->app->view('follow', array(
				'id' => $id
			)
		);

	}

	public function unfollow(){

		$id = htmlentities($_GET['id'], ENT_QUOTES);

		$unfollow = $this->app->unfollow($id);

		$this->app->view('unfollow', array(
				'id' => $id
			)
		);

	}

	public function deletePost(){

		if( !isset($_GET['id']) ){
			header('Location:' . SITE_URL);
		}

		$deletePost = $this->app->deletePost($_GET['id']);

		$this->app->view('deletePost', array(
				'id' => $id
			)
		);

	}

	public function register(){

		if(isset($_POST['register'])){
			$register_message = $this->app->registration($_POST['email'], $_POST['password']);

			$this->app->view('register', array(
				'register_message' => $register_message)
			);
		} else {
			$this->app->view('register');
		}

	}

	public function logout(){

		$this->app->logout();

	}
	
}