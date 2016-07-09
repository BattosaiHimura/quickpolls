<?php



class SignUp extends Controller
{

	function __construct()
	{
		parent::__construct();
		Session::init();

		$logged = Session::get("loggedIn");
		if ($logged == true) {
			header("Location: ".URL."dashboard");
			exit;
		}
	}

	function index()
	{
		$this->view->render('signup/signupPage');
	}

	function add() {
		$this->model->add();
	}


	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}
}