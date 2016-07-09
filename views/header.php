<?php Session::init();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>QuickPolls</title>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/footer.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo URL; ?>public/plugins/starRating/css/star-rating.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

	<!-- JQUERY -->
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="<?php echo URL; ?>public/js/jquery-ui.min.js"></script>

	<!-- BOOTSTRAP -->
	<script type="text/javascript" src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>

	<!-- QRCODES -->
	<script src="<?php echo URL; ?>public/js/jquery.qrcode.min.js"></script>
	
	
	<!--CHART.JS-->
	<script src="<?php echo URL; ?>public/plugins/chartjs/dist/Chart.bundle.js"></script>

	<!--CUSTOM SCRIPTS-->
	<script type="text/javascript" src="<?php echo URL; ?>public/js/custom.js"></script>
	<script src="<?php echo URL; ?>public/js/popup.js"></script>
	<script src="<?php echo URL; ?>public/js/gamification.js"></script>
</head>
<body>

<div class="container" id="content">

	<header class="header-two-bars">
		<!-- Static navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index">Quick Polls</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right prettyNavbar">
						<?php
							if (Session::get("loggedAs") == 1) { //logged as Professor
								$user = UsersQuery::create()->findById(Session::get("user"))->getData();

								//Get Total Polls Submitted for Gamification Badge
								$courses = ProfHasCourseQuery::create()->findByUsersId(Session::get("user"))->getData();

								$totpolls = 0;
								foreach ($courses as $c) {
									$polls = PollsQuery::create()->findByCourseId($c->getCoursesId())->getData();
									$totpolls += count($polls);
								}

								$badge = "";
								if ($totpolls >= rookie) $badge = "rookie.png";
								if ($totpolls >= senior) $badge = "senior.png";
								if ($totpolls >= master) $badge = "master.png";
								if ($totpolls >= topvoter) $badge = "topprof.png";
						?>
							<img id="badge" src="<?echo URL?>images/badges/<?echo $badge?>" alt="Badge"/>
							<li class="dropdown">
								<a href="dashboard" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user[0]->getName() . " " . $user[0]->getSurname()?></a>
								<ul class="dropdown-menu dropdown-menu-left">
									<li><a href="dashboard">Area Personale</a></li>
									<li><a href="index/logout">Log Out</a></li>
								</ul>		
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">I tuoi corsi <span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-left">
									<?php
									$courses = ProfHasCourseQuery::create()->findByUsersId(Session::get("user"))->getData();
									foreach ($courses as $course) {
									?>
									<li href="dashboard?course=<?php echo $course->getCoursesId()?>">
										<a href="dashboard?course=<?php echo $course->getCoursesId();?>">
										<?php
											$c = CoursesQuery::create()->findById($course->getCoursesId())->getData()[0];
											echo $c->getName();
										?>
										</a>
									</li>
									<?php
									}
									?>
									<li role="separator" class="divider"></li>
									<li><a href="#" data-toggle="modal" data-target="#addCourseModal">Aggiungi corso</a></li>
								</ul>
							</li>
							
						<?php
							} else if (Session::get("loggedAs") == 2) { //logged as Student
								$user = UsersQuery::create()->findById(Session::get("user"))->getData();

								//Get Total Polls Voted for Gamification Badge
								$votes = VotesQuery::create()->findByUsersId(Session::get("user"))->getData();

								$polls = array();
								foreach ($votes as $v) {
									$polls[] = $v->getPollId();
								}
								$polls = count(array_unique($polls));

								$badge = "";
								if ($polls >= rookie) $badge = "rookie.png";
								if ($polls >= senior) $badge = "senior.png";
								if ($polls >= master) $badge = "master.png";
								if ($polls >= topvoter) $badge = "topstudent.png";
						?>
							<img id="badge" src="<?echo URL?>images/badges/<?echo $badge?>" alt="Badge"/>
							<li class="dropdown">
								<a href="dashboard" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user[0]->getName() . " " . $user[0]->getSurname()?><span class="caret"></span></a>
								<ul class="dropdown-menu dropdown-menu-left">
									<li><a href="dashboard">Area Personale</a></li>
									<li><a href="index/logout">Log-out</a></li>
								</ul>
							</li>
						<?php } else { ?>

							<li><a href="signup">Sign Up</a></li>
							<li><a href="login">Sign In</a></li>

						<?php }?>
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	</header>

	<!-- MODALS MODAL -->
	<div id="msgModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Avviso</h4>
				</div>

				<div class="modal-body" id="msgModalMessage">
				</div>

				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-primary">ok</button>
				</div>
			</div>
		</div>
	</div>

	<?php
	$msg = "";
	if (isset($_GET["okmsg"]) || isset($_GET["msg"])) {
		$msg = (isset($_GET["okmsg"])) ? strip_tags($_GET["okmsg"]) : strip_tags($_GET["msg"]);
	?>
		<script>
			$(function() {
				$('#msgModalMessage').append("<p><?php echo $msg?></p>");
				$('#msgModal').modal("show");
			});
		</script>
	<?php
	}
	?>

	<!-- The content of your page would go here. -->
