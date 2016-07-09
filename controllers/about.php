<?php

class About extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
	}

	function index() {
		$this->view->render('about/aboutPage');

		//require 'models/login_model.php';
		//$model = new Login_Model();
	}


	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}

}