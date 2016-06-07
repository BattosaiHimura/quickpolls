<?php

class Login_Model extends Model
{

    function __construct()
    {
    }

    public function run()
    {

        $username = strip_tags($_POST["email"]);
        $password = hash("sha256", strip_tags($_POST["password"]));

        $user = UsersQuery::create()->findByEmail($username)->getData();

		//check user
        if($user != false) {

			$link = UserHasPwdQuery::create()->findByUserId($user[0]->getId())->getData()[0];
			$pwd = PwdsQuery::create()->findById($link->getPwdId())->getData()[0];

			//check password
			if($pwd->getPassword() == $password) {
				Session::init();
				Session::set('loggedIn', true);
				Session::set('loggedAs', $user[0]->getUserTypeId());
				Session::set('user', $user[0]->getId());
				header("Location: ".URL."dashboard");
				exit;
			} else {
				//PASSWORDS DO NOT MATCH
				$msg = urlencode("Password errata");
				header("Location: ".URL."login?msg=$msg");
				exit;
			}

		} else {
			//USER DOES NOT EXISTS
			$msg = urlencode("Username sbagliato");
			header("Location: ".URL."login?msg=$msg");
			exit;
		}
    }
}