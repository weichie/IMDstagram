<?php

class Router {

	protected $app;
	protected $protected_routes;

	public function __construct( $app, $protected_routes ){
		$this->app = $app;
		$this->protected_routes = $protected_routes;

		$this->init();
	}

	public function init(){

		if( isset( $_GET['route'] ) ){

			$route = $_GET['route'];

			if( strstr($route, '/') ){

				$route_ = explode('/',$_GET['route']);

				// Let's auth before we call the controller?
				if( $this->app->auth( $route, $this->protected_routes ) ){
					$ctrl = $route_[0].'Controller';
					$controller = new $ctrl($this->app);
					$controller->$route_[1]();
				}

			} else {
				$ctrl = $route.'Controller';
				$controller = new $ctrl();
				$controller->base();
			}

		} else {

			if( $this->app->isLoggedIn() ){
				header('Location: ' . SITE_URL . '/?route=user/profile');
			} else {
				$controller = new UserController($this->app);
				$controller->login();
			}
		}
	}
}