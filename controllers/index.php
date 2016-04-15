<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		//echo 'We are inside Index';
		$this->view->render('index/indexPage');

		//require 'models/login_model.php';
		//$model = new Login_Model();
	}

	function detail() {
		//echo 'We are inside Index-Detail';
		$this->view->render('index/indexPage');
	}

}