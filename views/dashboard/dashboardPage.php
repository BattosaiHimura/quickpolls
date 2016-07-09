
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
						<input class="form-control" id="searchinput" name="query" type="search" placeholder="Cerca sondaggio, corso o docente..."/>
					</div>
				</form>
			</div>
		</div>

		</div> <!-- /container -->

		<div class="container">

			<div class="table-responsive">
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
					$query = (isset($_GET["query"]) &&  $_GET["query"]!="") ? explode(" ", strip_tags($_GET["query"])) : null;
					foreach ($polls as $poll) {

						$course = CoursesQuery::create()->findById($poll->getCourseId())->getData()[0];
						$asc = ProfHasCourseQuery::create()->findByCoursesId($course->getId())->getData()[0];
						$prof = UsersQuery::create()->findById($asc->getUsersId())->getData()[0];

						$insert = (is_null($query)) ? true : false;
						if (!is_null($query)) {
							foreach ($query as $word) {
								if (strstr($course->getName(), $word) != false) $insert = true;
								if (strstr($poll->getTitle(), $word) != false) $insert = true;
								if (strstr($prof->getName(), $word) != false) $insert = true;
								if (strstr($prof->getSurname(), $word) != false) $insert = true;
							}
						}

						if($insert) {
					?>

					<tr class="text-center row-link" id="<?php echo $poll->getId();?>">
						<td><?php echo $poll->getDateFrom()->format("d/m/Y");?></td>
						<td>
							<?php echo $course->getName();?>
						</td>
						<td>
							<?php echo $prof->getName() . " " . $prof->getSurname(); ?>
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
								<span class="sr-only">Vota Sondaggio <?php echo $poll->getTitle()?></span>
							</a>
							<?php
							} else {
							?>
							<a href="<?php echo URL;?>dashboard?poll=<?php echo $poll->getId();?>">
								<span class="glyphicon glyphicon-remove-sign red"></span>
								<span class="sr-only">Vota Sondaggio <?php echo $poll->getTitle()?></span>
							</a>
							<?php
							}
							?>
						</td>
					</tr>
					<?php
						}
					}
					?>
					</tbody>
				</table>
			</div>
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

			$toSetChart = 0;
			if (count($polls) > 0) $toSetChart = $polls[0]->getId();
			if(isset($_GET["poll"]) && $_GET["poll"] != "") {
				$toSetChart = strip_tags($_GET["poll"]);
			}

			$pollTitle = "";
			if (count($polls) > 0) $pollTitle = $polls[0]->getTitle();
			foreach ($polls as $p) {
				if($p->getId() == $toSetChart) $pollTitle = $p->getTitle();
			}

			//TODO: Fetch data to send to the general chart
			?>
			<h1 class="page-header"><?php echo $course->getName() ?></h1>

			<span class="sr-only" for="grafici">Grafici</span>
			<div class="row placeholders " id="grafici">
				<?php if (count($polls) > 0) { ?>
					<label class="sr-only" for="grafCorso">Grafico Corso di <?php echo $course->getName()?></label>
					<div class="col-xs-12 col-sm-6  col-md-4 col-md-offset-2 canvas-holder" id="grafCorso">
						<canvas id="course-chart" width="600" height="600"></canvas>
						<h4><?php echo $course->getName(); ?></h4>
						<span class="text-muted">Grafico generale</span>
					</div>

					<label class="sr-only" for="grafPoll">Grafico del Sondaggio: <?php echo $pollTitle; ?></label>
					<div class="col-xs-12 col-sm-6 col-md-4 canvas-holder">
						<canvas id="poll-chart" width="600" height="600"></canvas>
						<h4><?php echo $pollTitle; ?></h4>
						<span class="text-muted">Grafico della lezione</span>
					</div>

					<label class="sr-only" for="grafPoll">Grafico degli Argomenti del Sondaggio</label>
					<div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3 canvas-holder">
						<canvas id="args-chart" width="600" height="600"></canvas>
						<h4>Argomenti del Sondaggio</h4>
						<span class="text-muted">Grafico degli argomenti</span>
					</div>
				<?php
					} else {
						echo "<h2>Benvenuto su QuickPolls!</h2>";
						echo "<p>Inizia subito a monitorare la tua didattica con i nostri strumenti.</p>";
					}
				?>

			</div>
			<br/>
			<div class="container adjustPadding" style="text-align: center">
				<button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
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
						<th class="text-center">QRCode</th>
					</tr>
					</thead>
					<tbody class="text-center">
						<?php

						$totalVotes1=0;
						$totalVotes2=0;
						$totalVotes3=0;
						$totalVotes4=0;
						$totalVotes5=0;
						foreach ($polls as $poll) {
							$ascs = PollsHasArgumentsQuery::create()->findByPollsId($poll->getId())->getData();
							$votes = VotesQuery::create()->findByPollId($poll->getId())->getData();

							// Generate the args chart data
							$args = array();
							$argsData = array();
							foreach ($ascs as $asc) {
								$v1=0;
								$v2=0;
								$v3=0;
								$v4=0;
								$v5=0;
								foreach ($votes as $vote) {
									if ($vote->getArgumentId() == $asc->getArgumentsId()) {
										$v = "v".$vote->getQualityId();
										$$v++;
									}
								}

								$argument = ArgumentsQuery::create()->findById($asc->getArgumentsId())->getData();

								$args[] = $argument[0]->getDescription();
								$argsData[] = "[".$v1.",".$v2.",".$v3.",".$v4.",".$v5."]";
							}

							$votes1=0;
							$votes2=0;
							$votes3=0;
							$votes4=0;
							$votes5=0;
							foreach ($votes as $vote) {
								$v = "votes".$vote->getQualityId();
								$$v++;

								$v = "totalVotes".$vote->getQualityId();
								$$v++;
							}
							$goodVotes = $votes4+$votes5;

							$total = $votes1+$votes2+$votes3+$votes4+$votes5;
							if($total == 0) $total = 1;

							$json = "[";
							$json .= round(($votes1*100)/$total,2).",";
							$json .= round(($votes2*100)/$total,2).",";
							$json .= round(($votes3*100)/$total,2).",";
							$json .= round(($votes4*100)/$total,2).",";
							$json .= round(($votes5*100)/$total,2);
							$json .= "]";

							?>
							<tr id="pollData<?php echo $poll->getId()?>">
								<!-- VOTES-->
								<input type="hidden" id="<?php echo $poll->getId()?>-data" value="<?php echo $json?>"/>
								<input type="hidden" id="<?php echo $poll->getId()?>-args" value="<?php echo $json?>"/>
								<input type="hidden" id="<?php echo $poll->getId()?>-args-data" value="<?php echo $json?>"/>

								<td><?php echo $poll->getDateFrom()->format("d/m/Y"); ?></td>
								<td poll='<?php echo $poll->getId()?>' class="pollData" <?php if($toSetChart == $poll->getId())  echo 'id="setChart"';?>>
									<?php echo $poll->getTitle(); ?>
								</td>
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
								<td>
									<?php
										$divide = (count($votes) > 0) ? count($votes) : null;

										$average = 0;

										if (!is_null($divide)) $average = $goodVotes * 100 / $divide;

										if ($average > 50) {
									?>
									<span class="glyphicon glyphicon-ok-sign green"></span>
									<?php
										} else if ($average == 50) {
									?>
									<span class="glyphicon glyphicon-minus-sign yellow"></span>
									<?php
										} else if ($average == 0){
									?>
									<span>-</span>
									<?php
										} else {

									?>
									<span class="glyphicon glyphicon-remove-sign red"></span>
									<?php
										}
									?>
								</td>
								<td>
									<input class="pollID" type="hidden" value="<?php echo $poll->getId()?>"/>
									<span class="glyphicon glyphicon-qrcode black qr"></span>
								</td>
							</tr>
						<?php
						}

						$toSetChartSelector = "#".$toSetChart."-data";
						?>
					</tbody>
				</table>

				<!--TOTAL VOTES-->
				<?php
					$totalVotes= $totalVotes1+$totalVotes2+$totalVotes3+$totalVotes4+$totalVotes5;

					if($totalVotes == 0) $totalVotes = 1;

					$json = "[";
					$json .= ($totalVotes1 * 100 / $totalVotes).",";
					$json .= ($totalVotes2 * 100 / $totalVotes).",";
					$json .= ($totalVotes3 * 100 / $totalVotes).",";
					$json .= ($totalVotes4 * 100 / $totalVotes).",";
					$json .= ($totalVotes5 * 100 / $totalVotes).",";
					$json .="]"
				?>
				<input type="hidden" id="totalData" value="<?php echo $json?>">

				<script>
					/**
					 * Created by BattosaiHimura on 02/07/16.
					 */
					$(function() {
						/* QR CODE REDIRECTION */
						$('.qr').on('click', function() {
							$url = "<?php echo URL.'qrcode?poll=';?>"+$(this).parent().find('.pollID').val();
							window.open($url, '_blank');
						});

						/* POLL LOADING */
						$('.pollData').on("click", function(){
							window.location = "<?php echo URL?>dashboard?poll="+$(this).attr("poll")
						});

						/* COURSE CHART */
						var ctx = document.getElementById("course-chart");
						var configCourse = {
							data: {
								datasets: [{
									data: [
										<?php echo round(($totalVotes1*100)/$totalVotes,2)?>,
										<?php echo round(($totalVotes2*100)/$totalVotes,2)?>,
										<?php echo round(($totalVotes3*100)/$totalVotes,2)?>,
										<?php echo round(($totalVotes4*100)/$totalVotes,2)?>,
										<?php echo round(($totalVotes5*100)/$totalVotes,2)?>
									],
									backgroundColor: ["#D9534F","#F0AD4E","#5BC0DE","#337AB7","#5CB85C"],
									label: 'Risultati sondaggio ' // for legend
								}],
								labels: ["Capito nulla","Capito poco","Capito qualcosa","Capito abbastanza","Capito tutto"]
							},
							options: {
								responsive: true,
								legend: {display: false, fullWidth: false, fontSize: 0},
								title: {display: false, text: 'Dati Generali Corso'},
								scale: {ticks: {beginAtZero: true},reverse: false},
								animation: {animateRotate: true},
							}
						};
						Chart.PolarArea(ctx, configCourse);


						/* POLL CHART */
						var ctx = document.getElementById("poll-chart");
						var configCourse = {
							data: {
								datasets: [{
									data: JSON.parse($("<?php echo $toSetChartSelector?>").val()),
									backgroundColor: ["#D9534F","#F0AD4E","#5BC0DE","#337AB7","#5CB85C"],
									label: 'Risultati sondaggio ' // for legend
								}],
								labels: ["Capito nulla","Capito poco","Capito qualcosa","Capito abbastanza","Capito tutto"]
							},
							options: {
								responsive: true,
								legend: {display: false, fullWidth: false, fontSize: 0},
								title: {display: false, text: 'Dati Generali Corso'},
								scale: {ticks: {beginAtZero: true},reverse: false},
								animation: {animateRotate: true},
							}
						};
						Chart.PolarArea(ctx, configCourse);


						//Random Colors Functions
						var randomColorFactor = function() {
							return Math.round(Math.random() * 255);
						};
						var randomColor = function(opacity) {
							return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
						};

						/* ARGS CHART */
						var ctx = document.getElementById("args-chart");
						var configArgs = {
							data: {
								datasets: [
								<?php
								$ascs = PollsHasArgumentsQuery::create()->findByPollsId($toSetChart)->getData();
								$votes = VotesQuery::create()->findByPollId($toSetChart)->getData();

								// Generate the args chart data
								$args = array();
								$argsData = array();
								foreach ($ascs as $asc) {
									$v1=0;
									$v2=0;
									$v3=0;
									$v4=0;
									$v5=0;
									$total = 0;
									foreach ($votes as $vote) {
										if ($vote->getArgumentId() == $asc->getArgumentsId()) {
											$v = "v".$vote->getQualityId();
											$$v++;
											$total++;
										}
									}

									if($total == 0) $total = 1;

									$argument = ArgumentsQuery::create()->findById($asc->getArgumentsId())->getData();

									$label = $argument[0]->getDescription();
									$data = "[".($v1*100/$total).",".($v2*100/$total).",".($v3*100/$total).",".($v4*100/$total).",".($v5*100/$total)."]";
								?>
									{
										label: "<?php echo $label?>",
										backgroundColor: randomColor(),
										borderColor: randomColor(),
										pointBackgroundColor: randomColor(),
										pointBorderColor: "#fff",
										pointHoverBackgroundColor: "#fff",
										pointHoverBorderColor: randomColor(),
										data: JSON.parse("<?php echo $data?>")
									},
								<?php
								}
								?>],
								labels: ["Capito nulla","Capito poco","Capito qualcosa","Capito abbastanza","Capito tutto"]
							},
							options: {
								responsive: true,
								legend: {display: true, fullWidth: false, fontSize: 0},
								title: {display: false, text: 'Dati Generali Corso'},
								scale: {ticks: {beginAtZero: true},reverse: false},
								animation: {animateRotate: true},
								scaleSteps: 100
							}
						};
						Chart.Radar(ctx, configArgs);

					});
				</script>
			</div>
	<?php
			}
		}
	?>

<?php
	} else {
		//header("Location".URL."index/logout");
		echo "<h1>Solo Chuck Norris sa dividere per zero.</h1>";
		exit;
	}
?>
