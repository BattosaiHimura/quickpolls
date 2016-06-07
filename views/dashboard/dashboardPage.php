
<?php
	if (Session::get("loggedAs") == 2) { //logged as student
?>
		<div class="jumbotron centerBlock">
			<h1>I tuoi sondaggi</h1>
			<p>Qui puoi trovare i sondaggi messi a disposizione dai tuoi docenti e rispondere a quelli non ancora
				compilati</p>
			<p class="text-center">Non trovi quello che stai cercando? Prova la funzione cerca</p>
			<div class="container">
				<form role="form" class="form-horizontal centerDim">
					<div class="form-group classHolder" style="margin: 0 auto">
						<input class="form-control" id="searchinput" name="query" type="search" placeholder="Cerca sondaggio o docente..."/>
					</div>
				</form>
			</div>
		</div>

		</div> <!-- /container -->

		<div class="container">

			<table class="table table-striped table-hover">
				<thead>
				<tr >
					<th class="text-center">
						Data
					</th>
					<th class="text-center">
						Corso
					</th>
					<th class="text-center">
						Docente
					</th>
					<th class="text-center">
						Titolo
					</th>
					<th class="text-center">
						Compilato
					</th>
				</tr>
				</thead>
				<tbody>
				<?php
				$polls = PollsQuery::create()->find()->getData();
				foreach ($polls as $poll) {
				?>

				<tr class="text-center row-link" id="<?php echo $poll->getId();?>">
					<td><?php echo $poll->getDateFrom()->format("d/m/Y");?></td>
					<td>
						<?php
						$course = CoursesQuery::create()->findById($poll->getCourseId())->getData()[0];
						echo $course->getName();
						?>
					</td>
					<td>
						<?php
						$asc = ProfHasCourseQuery::create()->findByCoursesId($course->getId())->getData()[0];
						$prof = UsersQuery::create()->findById($asc->getUsersId())->getData()[0];
						echo $prof->getName() . " " . $prof->getSurname();
						?>
					</td>
					<td><?php echo $poll->getTitle()?></td>
					<td>
						<?php
						$cond = array("UsersId" => Session::get("user"), "PollId"=>$poll->getId());
						$voted = count(VotesQuery::create()->findByArray($cond)->getData());

						if($voted) {
						?>
						<a href="<?php echo URL;?>dashboard?poll=<?php echo $poll->getId();?>">
							<span class="glyphicon glyphicon-ok-sign green"></span>
						</a>
						<?php
						} else {
						?>
						<a href="<?php echo URL;?>dashboard?poll=<?php echo $poll->getId();?>">
							<span class="glyphicon glyphicon-remove-sign red"></span>
						</a>
						<?php
						}
						?>
					</td>
				</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>

<?php
	} else if (Session::get("loggedAs") == 1) { //logged as Professor

		$courses = ProfHasCourseQuery::create()->findByUsersId(Session::get("user"))->getData();

		if ($courses == false) {
?>
			<h1 class="page-header">Non hai ancora aggiunto nessun corso!</h1>

			<div class="jumbotron centerBlock" >
				<h3>Per aggiungere un corso, clicca sul pulsante Aggiungi</h3>
				<button type="button" class="btn btn-primary btn-lg block-center" data-toggle="modal" data-target="#addCourseModal" >Aggiungi</button>
			</div>
		</div>

	<?php
		} else {
			$cID = (isset($_GET["course"]) && is_numeric($_GET["course"])) ? strip_tags($_GET["course"]) : ProfHasCourseQuery::create()->findByUsersId(Session::get("user"))->getData()[0]->getCoursesId();
			$course = CoursesQuery::create()->findById($cID)->getData()[0];

			//Reperimento dei sondaggi associati al corso e al docente
			$polls = PollsQuery::create()->findByCourseId($cID)->getData();

			//TODO: Fetch data to send to the general chart
			?>
			<h1 class="page-header"><?php echo $course->getName() ?></h1>

			<div class="row placeholders ">
				<script src="public/js/chart.js"></script>
				<script src="public/plugins/chartjs/dist/Chart.bundle.js"></script>
				<div class="col-xs-12 col-sm-6  col-md-4 col-md-offset-2 canvas-holder">
					<canvas id="chart-area" width="600" height="600"></canvas>
					<h4><?php echo $course->getName(); ?></h4>
					<span class="text-muted">Grafico generale</span>
				</div>
				<?php if (count($polls) > 0) { ?>
					<div class="col-xs-12 col-sm-6 col-md-4 canvas-holder">
						<canvas id="chart-areaA" width="600" height="600"></canvas>
						<h4><?php echo $polls[0]->getTitle(); ?></h4>
						<span class="text-muted">Grafico della lezione</span>
					</div>
				<?php } ?>

			</div>
			<br/>
			<div class="container adjustPadding" style="text-align: center">
				<button type="button" class="btn btn-primary btn-lg block-center" data-toggle="modal"
						data-target="#addPollModal">Aggiungi Sondaggio
				</button>
			</div>
			<?php if (count($polls) > 0) { ?>
			<br/>
			<h2 class="sub-header">Questionari proposti</h2>
			<div class="table-responsive">
			<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th class="text-center">Data</th>
				<th class="text-center">Titolo</th>
				<th class="text-center">Numero Partecipanti</th>
				<th class="text-center">% Risposte positive (&ge; 4 stelle)</th>
				<th class="text-center">Risultato sintetico</th>
			</tr>
			</thead>
			<tbody class="text-center">
			<?php

				foreach ($polls as $poll) {
					$ascs = PollsHasArgumentsQuery::create()->findByPollsId($poll->getId());
					$votes = VotesQuery::create()->findByPollId($poll->getId())->getData();

					$goodVotes = 0;
					foreach ($votes as $vote) {
						if ($vote->getQualityId() >= 4) $goodVotes++;
					}

					//TODO: Fetch data to send to the course chart
					?>
					<tr id="randomizeData">
						<td><?php echo $poll->getDateFrom()->format("d/m/Y"); ?></td>
						<td><?php echo $poll->getTitle(); ?></td>
						<td><?php echo count($votes) / count($ascs); ?></td>
						<td>
							<?php
							if (count($votes) > 0) {
								echo number_format(($goodVotes * 100 / count($votes)), 2, ",", ".") . "%";
							} else {
								echo "Non votato";
							}
							?>
						</td>
						<td><span class="glyphicon glyphicon-ok-sign green"></span></td>
					</tr>
					<?php
				}
				?>
				</tbody>
				</table>
				</div>
				</div>
	<?php
			}
		}
	?>

<?php
	} else {
		header("Location".URL."index/logout");
		exit;
	}
?>
