<?php

class Router {

	public $app;

	public function __construct( $app ){
		$this->app = $app;

		$this->init();
	}

	public function init(){

		if( isset( $_GET['route'] ) ){

			$route = $_GET['route'];

			if( strstr($route, '/') ){

				$route = explode('/',$_GET['route']);

				$ctrl = $route[0].'Controller';
				$controller = new $ctrl($this->app);
				$controller->$route[1]();

			} else {
				new $route();
			}

		} else {

			// Check if user is logged in
			$controller = new UserController($this->app);
			$controller->login();

		}
	}
}