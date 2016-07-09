

			<script type="text/javascript" src="public/js/signup.js"></script>

			<form id="signupForm" class="form-signin"  action="signup/add" method="post">

				<h2 class="form-signin-heading">Iscriviti</h2>
				<!-- method="post" action="" -->
				<div class="form-group">
					<label class="sr-only" for="name">Nome</label>
					<div class="classHolder">
						<input type="text" class="form-control" id="name" name="name" placeholder="Nome" required />

					</div>
				</div>

				<div class="form-group" >
					<label class="sr-only" for="surname">Cognome</label>
					<div class="classHolder">
						<input type="text" class="form-control" id="surname" name="surname" placeholder="Cognome" required />
					</div>
				</div>

				<div class="form-group">
					<label class="sr-only" for="type">Tipo Utente</label>
					<select class="form-control" id="type" name="type" >
						<option value="studente" selected="selected">Studente</option>
						<option value="professore">Professore</option>
					</select>
				</div>

				<div class="form-group" >
					<label class="sr-only" for="email">Email</label>
					<div class="classHolder">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" title="Inserisci un'email valida UNIBO" required pattern="([a-zA-Z0-9\.])*\w@((studio\.unibo\.it)|(unibo\.it))"/>
					</div>
				</div>

				<div class="form-group">
					<label class="sr-only" for="pwd">Password</label>
					<div class="classHolder">
						<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" />
						<!--<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" title="La password deve essere alfanumerica con almeno una maiuscola, e un carattere special" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$" / >-->
					</div>
				</div>

				<div class="form-group">
					<label class="sr-only" for="pwd2">Confirm password</label>
					<div class="classHolder">
						<input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Confirm password" />
					</div>
				</div>
				<div class="classHolder">
					<button class="btn btn-lg btn-primary btn-block col-md-3" type="submit">Sign up</button>
				</div>

			</form>
		</div>