<?php

class SignUp_Model extends Model
{

	function __construct()
	{
		//echo 'SignUp model';
	}

	public function add()
	{
		//password check
		if($_POST["pwd"] != $_POST["pwd2"]) {
			//PASSWORDS DO NOT MATCH, REDIRECT TO ORIGIN
			header("Location: ".URL."signup");
			exit;
		}

		//email check
		$email = strip_tags($_POST["email"]);
		$mailQuery = UsersQuery::create()->findByEmail($email)->getData();
		if ($mailQuery != false) {
			//USER ALREADY PRESENT ON DB
			$message = urlencode("La mail inserita &egrave; gi&agrave; presente nel nostro database.");
			header("Location: ".URL."signup?msg=$message");
			exit;
		}

		//Creating the user
		$user = new Users();
		$user->setName(strip_tags($_POST["name"]));
		$user->setSurname(strip_tags($_POST["surname"]));
		$user->setEmail($email);
		if (strip_tags($_POST["type"]) == "studente") {
			$ut = UserTypeQuery::create()->findByDescription("Studente")->getData()[0];
			$user->setUserType($ut);
		} else if (strip_tags($_POST["type"]) == "professore") {
			$ut = UserTypeQuery::create()->findByDescription("Professore")->getData()[0];
			$user->setUserType($ut);
		}
		$user->save();

		//Creating the Password
		$password = new Pwds();
		$salt = $this->rand_string(64);
		$password->setSalt($salt);
		$toSave = $salt . strip_tags($_POST["pwd"]) . $salt;
		$password->setPassword(hash("sha256", $toSave));
		$password->save();


		//Linking User & Password
		$user_has_password = new UserHasPwd();
		$user_has_password->setUserId($user->getId());
		$user_has_password->setPwdId($password->getId());
		$from = date("Y-m-d");
		$to = date("Y-m-d", strtotime($from . "+ 3 months"));
		$user_has_password->setDateFrom($from);
		$user_has_password->setDateTo($to);
		$user_has_password->save();


		Session::set('loggedIn', true);
		Session::set('loggedAs', $ut->getId());
		Session::set('user', $user->getId());
		header("Location: ".URL."dashboard");
		exit;
	}


	/* random string */
	private function rand_string( $length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen( $chars );
		$str="";
		for( $i = 0; $i < $length; $i++ ) {
			$str .= $chars[ rand( 0, $size - 1 ) ];
		}
		return $str;
	}
}