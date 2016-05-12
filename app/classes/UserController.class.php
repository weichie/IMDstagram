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

		$this->app->view('profile', array(
				'posts' => $posts
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

		$this->app->view('edit_profile');

	}
	
}