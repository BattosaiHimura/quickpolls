<?php

class Help extends Controller {

	function __construct() {
		parent::__construct();
		//echo 'We are inside help<br />';
	}

	function index () {
		$this->view->render('help/helpPage');
	}

	public function other($arg = false) {


		require 'models/help_model.php';
		$model = new Help_Model();

		$this->view->blah = $model->blah();
	}

}