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

		$posts = $this->app->getPosts();
		$bio = $this->app->getBio();

		$this->app->view('profile', array(
				'posts' => $posts,
				'bio' => $bio,
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
			$update_message = $this->app->update_user($_POST['email'], $_POST['name'], $_POST['username'], $_POST['site'], $_POST['bio']);
		
			$bio = $this->app->getBio();

			$this->app->view('edit_profile', array(
					'update_message' => $update_message,
					'bio' => $bio
				)
			);
		} else {

			$bio = $this->app->getBio();

			$this->app->view('edit_profile', array(
					'bio' => $bio
				)
			);

		}

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
	
}