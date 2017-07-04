$(document).ready(function() {
	$('#start-install').click(function() {
		startInstall();
	});
});

function startInstall() {
	clearFormMessages();

	if (!verifyInstall()) {
		return;
	}

	$.ajax({
		url: SITE_URL + 'ajax/start-install',
		type: 'POST',
		data: {
			email: $('#superuser-email').val(),
			password: $('#superuser-password').val()
		},
		success: function(result) {
			result = JSON.parse(result);

			if (result.status == 'success') {
				window.location = 'login';
			}
			else {
				addFormMessage('There was an error while installing the application.');
			}
		},
		error: function(result) {
			addFormMessage('There was an error while installing the application.');
		}
	});
	
}

function verifyInstall() {
	
	var isVerified = true;

	if ($.trim($('#superuser-email').val()).length == 0) {
		addFormMessage('Superuser email is required.');
		isVerified = false;
	}

	if ($.trim($('#superuser-password').val()).length == 0) {
		addFormMessage('Superuser password is required.');
		isVerified = false;
	}

	return isVerified;

}
