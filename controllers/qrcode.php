<?php

class QrCode extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
	}

	function index() {
		//echo 'We are inside Index';
		$this->view->render('qrcode/qrCodePage');
	}

	function detail() {
		//echo 'We are inside Index-Detail';
		$this->view->render('qrcode/qrCodePage');
	}


	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}

}