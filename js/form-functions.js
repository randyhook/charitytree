function addFormMessage(msg) {
	$('.messages').append('<li>' + msg + '</li>');
}

function clearFormMessages() {
	$('.messages').html('');
}
