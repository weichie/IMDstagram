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

		$this->app->view('profile');

	}

	public function feed(){

		$this->app->view('feed');

	}

	public function post(){

		if( isset($_GET['id']) ){

			$getPicture = $this->app->db->query('SELECT * FROM posts WHERE id="'.$_GET['id'].'"');
			if( $getPicture ){

				$getPicture = $getPicture->fetch_assoc();
				$picture = $getPicture['image_url'];

			}

		}

		// Give our view the picture :)
		$this->app->view('post', array(
				'picture' => $picture,
			)
		);

	}

	public function do_upload(){

		$this->app->view('do_upload');

	}

	public function edit_profile(){

		$this->app->view('edit_profile');

	}
	
}