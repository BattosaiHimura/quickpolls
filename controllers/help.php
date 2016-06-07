<?php

class Help extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
	}

	function index () {
		$this->view->render('help/helpPage');
	}

	public function other($arg = false) {
		require 'models/help_model.php';
		$model = new Help_Model();

		$this->view->blah = $model->blah();
	}



	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}

}