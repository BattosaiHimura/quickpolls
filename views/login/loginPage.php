
			
            <form id="loginForm" class="form-signin" method="post" action="login/run">
                <h2 class="form-signin-heading">Accedi</h2>

				<div class="form-group">
					<label for="inputEmail" class="sr-only">Indirizzo Email</label>
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Indirizzo Email" required autofocus>
				</div>

				<div class="form-group">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
				</div>

				<!--
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember-me" checked> Remember me
                    </label>
                </div>

				-->
				
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

        </div> <!-- /container -->
