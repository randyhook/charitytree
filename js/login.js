$(document).ready(function() {

	$('#log-in').click(function() {
		switch ($('#email').val()) {
			case 'm':
				window.location = 'manager-dashboard';
				break;
			case 'c':
			default:
				window.location = 'client-dashboard';
				break;
		}
	});

});
