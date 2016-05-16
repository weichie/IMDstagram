<?php

class AjaxController {

	protected $app;

	public function __construct($app){
		$this->app = $app;
	}
	
	public function comment(){
		if( isset($_POST['comment']) ){
			$result = $this->app->postComment($_POST['post_id'], $_POST['comment'], true);

			if( $result ){
				echo 'ok';
			}
		}
	}

	public function like(){
		if( isset($_POST['post_id']) ){
			$result = $this->app->likePost($_POST['post_id']);

			if( $result ){
				echo 'ok';
			} 
		}
	}
}