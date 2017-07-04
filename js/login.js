$(document).ready(function() {

	$('#log-in').click(function() {
		login();
	});

});

function login() {
	clearFormMessages();

	if (!verifyLoginForm()) {
		return;
	}

	$.ajax({
		url: SITE_URL + 'ajax/user/submit-login',
		type: 'POST',
		data: {
			email: jQuery('#email').val(),
			password: jQuery('#password').val()
		},
		success: function(result) {

			result = JSON.parse(result);

			if (result.status == 'success') {
				addFormMessage('Login successful.');
			}
			else {
				addFormMessage('The entered credentials were not found.');
			}

		},
		error: function(result) {
			addFormMessage('There was an internal error.');
		}
	});
}

function verifyLoginForm() {
	var isVerified = true;

	if ($.trim($('#email').val()).length == 0) {
		addFormMessage('Your email is required.');
		isVerified = false;
	}

	if ($.trim($('#password').val()).length == 0) {
		addFormMessage('Your password is required.');
		isVerified = false;
	}

	return isVerified;
}
