<?php



class Login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('login/loginPage');
    }
    function run() {
        $this->model->run();
    }
}