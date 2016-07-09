<?php

class MyError extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
	}

	function index() {
		//$this->view->msg = 'This page doesn\'t exist!';
		$this->view->msg = 'Perch&egrave; scrivi boiate figliuolo?';
		$this->view->render('errors/errorPage');
	}



	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}
}