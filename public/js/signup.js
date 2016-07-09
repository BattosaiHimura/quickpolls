/**
 * Created by BattosaiHimura on 31/05/16.
 */
$( document ).ready( function () {
	var password = document.getElementById("pwd"),
		confirm_password = document.getElementById("pwd2");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Le Passoword non coincidono");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;


} );