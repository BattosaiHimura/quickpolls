<?php



class Dashboard extends Controller
{

	function __construct()
	{
		parent::__construct();
		Session::init();

		$logged = Session::get("loggedIn");
		if ($logged == false) {
			Session::destroy();
			header("Location: ".URL."login");
			exit;
		}
	}

	function index()
	{
		$this->view->render('dashboard/dashboardPage');
	}

	function addCourse() {
		$this->model->addCourse();
	}

	function addPoll() {
		$this->model->addPoll();
	}

	function votePoll() {
		$this->model->votePoll();
	}

	function logout() {
		Session::destroy();
		header("Location: ".URL."index");
		exit;
	}
}