<?php

class UserController {

	protected $app;

	public function __construct($app){
		$this->app = $app;
	}

	public function login(){

		new View('login');

	}

	public function profile(){

		new View('profile');

	}
	
}