<?php



class Login extends Controller
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
        $this->view->render('login/loginPage');
    }
    function run() {
        $this->model->run();
    }


	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}
}