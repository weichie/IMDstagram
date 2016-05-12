<?php

class View {

	public function __construct( $view = '', $params = '' ){

		if( empty( $params )) {

			// Default
			$params = array(
				'title' => 'Welcome'
			);

		} else {
			extract($params);
		}

		include 'app/views/base.php';

	}
}