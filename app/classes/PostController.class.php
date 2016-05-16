<?php

class PostController {

	protected $app;

	public function __construct($app){
		$this->app = $app;
	}

	public function comment(){

		if( isset($_POST['comment']) ){

			$this->app->postComment($_POST['post_id'], $_POST['comment']);

		}

	}
	
}