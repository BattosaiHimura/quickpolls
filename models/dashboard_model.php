<?php

class dashboard_Model extends Model
{

	function __construct()
	{
		//echo 'SignUp model';
	}
	
	public function addCourse() {
		if(isset($_POST["user"]) && isset($_POST["titolo"]) && $_POST["titolo"] != "") {
			$id = strip_tags($_POST["user"]);

			$user = UsersQuery::create()->findById($id)->getData()[0];

			if ($user->getUserTypeId() == 1) { //is Professor, continue
				$titolo = strip_tags($_POST["titolo"]);

				//echo "Course $corso will be added";

				// crea il corso
				$corso = new Courses();
				$corso->setName($titolo);
				$corso->setDescription("");
				$corso->setSemester("");
				$corso->setDateFrom("");
				$corso->setDateTo("");

				$corso->save();

				// associa il corso al prof
				$asc = new ProfHasCourse();
				$asc->setUsersId($id);
				$asc->setCoursesId($corso->getId());
				$asc->setIsLab("false");
				$asc->setPresence(0);

				$asc->save();

				header("Location: ".URL."dashboard?course=".$asc->getCoursesId());
				exit;

			} else {
				header("Location: ".URL."dashboard");
				exit;
			}

		} else {
			header("Location: ".URL."index");
			exit;
		}
	}


	public function addPoll() {
		if((isset($_POST["titolo"]) && $_POST["titolo"] != "") && (isset($_POST["args"]) && is_array($_POST["args"]))) {
			//prof
			$idU = strip_tags($_POST["user"]);
			$idC = strip_tags($_POST["course"]);
			$user = UsersQuery::create()->findById($idU)->getData()[0];

			if ($user->getUserTypeId() == 1) { //is Professor, continue
				// course check
				$asc = ProfHasCourseQuery::create()->findByCoursesId($idC)->getData()[0];
				if($asc->getUsersId() == $idU) {

					$title = strip_tags($_POST["titolo"]);

					$date = date("Y-m-d");

					//create the poll
					$poll = new Polls();
					$poll->setTitle($title);
					$poll->setCourseId($idC);
					$poll->setDateFrom($date);

					$poll->save();

					// create the arguments
					foreach ($_POST["args"] as $arg) {
						$a = strip_tags($arg);
						$argument = new Arguments();
						$argument->setCourseId($idC);
						$argument->setDescription($a);
						$argument->setDate($date);

						$argument->save();

						$argToPoll = new PollsHasArguments();
						$argToPoll->setArgumentsId($argument->getId());
						$argToPoll->setPollsId($poll->getId());

						$argToPoll->save();
					}

					//Poll created
					$msg = "Sondaggio creato con successo!";
					header("Location: ".URL."dashboard?course=" . $idC . "&okmsg=".urlencode($msg));

				} else {
					//error with the course association
					header("Location: ".URL."dashboard");
					exit;
				}
			} else {
				//error with the user type
				header("Location: ".URL."dashboard");
				exit;
			}
		} else {
			//error with the form args
			header("Location: ".URL."dashboard");
			exit;
		}
	}

	public function votePoll() {
		//check for poll
		if((isset($_POST["poll"]) && $_POST["poll"] != "") && (isset($_POST["user"]) && $_POST["user"] >0)) {

			//Check for user existence
			$user = UsersQuery::create()->findById(strip_tags($_POST["user"]))->getData()[0];
			if ($user != false) {
				//Check for user Type
				if ($user->getUserTypeId() == 2) { // is student
					//Check for Poll existence
					$poll = PollsQuery::create()->findById(strip_tags($_POST["poll"]))->getData()[0];
					if($poll != false) { // poll exists
						$ascs = PollsHasArgumentsQuery::create()->findByPollsId($poll->getId())->getData();

						foreach ($ascs as $asc) {
							$value = strip_tags($_POST[$asc->getArgumentsId()]);

							$vote = new Votes();

							$vote->setUsersId($user->getId());
							$vote->setPollId($poll->getId());
							$vote->setArgumentId($asc->getArgumentsId());
							$vote->setQualityId($value);

							$vote->save();

							$msg="Sondaggio votato con successo!";
							header("Location: ".URL."dashboard?okmsg=".$msg);

						}
					} else {
						header("Location: " . URL . "index");
						exit;
					}
				} else {
					header("Location: ".URL."index");
					exit;
				}
			} else {
				header("Location: ".URL."index");
				exit;
			}
		} else {
			header("Location: ".URL."index");
			exit;
		}
	}

}