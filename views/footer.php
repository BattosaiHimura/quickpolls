       <!--MODALS-->
<?php if (Session::get("loggedIn") == true && Session::get("loggedAs") == 1) { ?>
	<!-- ADD COURSE MODAL -->
	<div id="addCourseModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Inserisci nuovo corso</h4>
				</div>

				<div class="modal-body">
					<form id="signupForm1" class="form-signin" action="dashboard/addCourse" method="POST">
						<input type="hidden" name="user" value="<?php echo Session::get('user') ?>"/>
						<div class="form-group">
							<label class="sr-only" for="titoloCorso">Titolo corso</label>
							<input type="text" class="form-control" id="titoloCorso" name="titolo"
								   placeholder="Titolo corso" required/>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Aggiungi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- ADD POLL MODAL -->
	<div id="addPollModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Inserisci nuovo sondaggio</h4>
				</div>

				<div class="modal-body">
					<script src="public/js/addRemoveField.js"></script>
					<form id="signupForm1" class="form-signin" action="dashboard/addPoll" method="POST">
						<input type="hidden" name="user" value="<?php echo Session::get('user') ?>"/>
						<input type="hidden" name="course" value="<?php echo $cID ?>"/>
						<div class="form-group">
							<label class="sr-only" for="titolo">Titolo Sondaggio</label>
							<input type="text" class="form-control" id="titolo" name="titolo"
								   placeholder="Titolo sondaggio" required/>
						</div>
						<div id="lastOne">
							<div class="form-group">
								<label class="sr-only" for="argomento">Argomento</label>
								<div class="classHolder">
									<input type="text" class="form-control" id="argomento" name="args[]"
										   placeholder="Argomento" required/>
								</div>
							</div>
						</div>
						<div class="form-signin">
							<a class="btn btn-lg btn-primary btn-block add_field_button">Aggiungi argomento</a>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-lg btn-primary btn-block">Aggiungi</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
} else {
		if (Session::get("loggedAs") == 2 && isset($_GET["poll"])) { //modals for students
			$pID = strip_tags($_GET["poll"]);
			$poll = PollsQuery::create()->findById($pID)->getData()[0];
			$course = CoursesQuery::create()->findById($poll->getCourseId())->getData()[0];
			$ascs = PollsHasArgumentsQuery::create()->findByPollsId($pID)->getData();

			$cond = array("UsersId" => Session::get("user"), "PollId" => $poll->getId());
			$votes = VotesQuery::create()->findByArray($cond)->getData();

			if (!$votes) {
?>
				<!-- VOTE POLL MODAL -->
				<div id="votePollModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<span class="sr-only">Vota Sondaggio <?php echo $poll->getTitle()?></span>
								<h4 class="modal-title"><?php echo $poll->getTitle() ?></h4>
							</div>

							<div class="modal-body">
								<p><?php echo "<b>data: </b>" . $poll->getDateFrom()->format("d/m/Y"); ?></p>
								<p><?php echo "<b>corso: </b>" . $course->getName(); ?></p>
								</br>
								<form id="signupForm1" class="poll-signin" action="dashboard/votePoll" method="POST">
									<script src="public/plugins/starRating/star-rating.min.js"></script>
									<input type="hidden" name="poll" value="<?php echo $poll->getId(); ?>">
									<input type="hidden" name="user" value="<?php echo Session::get("user"); ?>">
									<?php
									foreach ($ascs as $asc) {
										$arg = ArgumentsQuery::create()->findById($asc->getArgumentsId())->getData()[0];
										?>
										<p><?php echo $arg->getDescription(); ?></p>
										<input id="input-a" name="<?php echo $arg->getId(); ?>" value="2" type="number"
											   class="rating"
											   min=0 max=5 step=1 data-size="xs">
										<span class="sr-only">Vota Argomento <?php echo $arg->getDescription()?></span>
										<?php
									}
									?>
									</br>
									<button type="submit" class="btn btn-lg btn-primary">Invia
										sondaggio &raquo;</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<script>
					$('#votePollModal').modal("show");
				</script>
<?php
			} else {
?>
				<!-- VOTED POLL MODAL -->
				<div id="votedPollModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><?php echo $poll->getTitle() ?></h4>
							</div>

							<div class="modal-body">
								<p><?php echo "<b>data: </b>" . $poll->getDateFrom()->format("d/m/Y"); ?></p>
								<p><?php echo "<b>corso: </b>" . $course->getName(); ?></p>
								</br>
								<form id="signupForm1" class="poll-signin" action="#" method="POST">
									<script src="public/plugins/starRating/star-rating.min.js"></script>
									<input type="hidden" name="poll" value="<?php echo $poll->getId(); ?>">
									<input type="hidden" name="user" value="<?php echo Session::get("user"); ?>">
									<?php
									foreach ($votes as $vote) {
										$arg = ArgumentsQuery::create()->findById($vote->getArgumentId())->getData()[0];

										?>
										<p><?php echo $arg->getDescription(); ?></p>
										<input id="input-a" name="<?php echo $arg->getId(); ?>" value="<?php echo $vote->getQualityId();?>" type="number"
											   class="rating"
											   min=0 max=5 step=1 data-size="xs" readonly>
										<?php
									}
									?>
									</br>
									<p>Questo Sondaggio &egrave; gi&agrave; stato votato.</p>
								</form>
							</div>
						</div>
					</div>
				</div>
				<script>
					$('#votedPollModal').modal("show");
				</script>
<?php
			}
		}
}
?>



        <footer class="footer">
            <hr class="featurette-divider">
            <p class="text-center">Sito web realizzato per il corso di Applicazione e Servizi Web dal </br>
                Team <img src="images/logoTeam.png" alt="Logo" style="width:20px;height:20px;"> -
                F.Limardo, M.Martella, N.Zuluaga</p>
        </footer>

    </body>
</html>