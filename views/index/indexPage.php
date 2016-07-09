	<!-- Main component for a primary marketing message or call to action -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img class="first-slide" src="images/aulaMagnaPSI2.jpg" alt="First slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Quick Polls</h1>
							<p>Il nuovo servizio di rilevazione della qualità della didattica che permette di avere un responso in tempi brevi sulla comprensione degli argomenti svolti a lezione </p>
							<p><a class="btn btn-lg btn-primary" href="about" role="button">Scopri di più</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img class="second-slide" src="images/studentUNIBO.png" alt="Second slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Per gli studenti</h1>
							<p>In pochi passi e semplici passi puoi comunicare al tuo docente quanto hai capito degli argomenti svolti a lezione</p>
							<?php if (Session::get("loggedIn") == true) {?>
								<p><a class="btn btn-lg btn-primary" href="dashboard" role="button">Accedi alla tua Area Personale</a></p>
							<?php } else { ?>
							<p><a class="btn btn-lg btn-primary" href="signup" role="button">Iscriviti subito</a></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="item">
					<img class="third-slide" src="images/ubertini1.jpg" alt="Third slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Per i docenti</h1>
							<p>Aggiungi tramite una dashboard intuitiva il sondaggio della lezione odierna: i tuoi alunni potranno dare il loro feedback sulla comprensione di quanto fatto in aula.  </p>
							<?php if (Session::get("loggedIn") == true) {?>
								<p><a class="btn btn-lg btn-primary" href="dashboard" role="button">Accedi alla tua Area Personale</a></p>
							<?php } else { ?>
								<p><a class="btn btn-lg btn-primary" href="signup" role="button">Iscriviti subito</a></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div><!-- /.carousel -->

	</div> <!-- /container -->
	<div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="images/star.png" alt="Scala di voto a 5 stelle" width="140" height="140">
				<h2>Semplice e intuitivo</h2>
				<p>Un punteggio in una scala da 1 a 5 indica il livello di comprensione dell'argomento</p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="images/poll.jpg" alt="Sondaggi Semplici e Veloci" alt="Sondaggi semplici" width="140" height="140">
				<h2>Dashboard per il docente</h2>
				<p>Caricare il sondaggio di una lezione o vederne i risultati non poteva essere più facile </p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="images/orange-qr-code.png" alt="QR Code per accedere velocemente ai sondaggi" width="140" height="140">
				<h2>QRCode</h2>
				<p>Basta un QRCode per per far trovare facilmente il sondagio appena caricato</p>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->

	</div>