$(document).ready(function() {
	$('#start-install').click(function() {
		startInstall();
	});
});

function startInstall() {
	clearMessages();

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
		},
		error: function(result) {
		}
	});
	
}

function verifyInstall() {
	
	var isVerified = true;

	if ($.trim($('#superuser-email').val()).length == 0) {
		addMessage('Superuser email is required.');
		isVerified = false;
	}

	if ($.trim($('#superuser-password').val()).length == 0) {
		addMessage('Superuser password is required.');
		isVerified = false;
	}

	return isVerified;

}
