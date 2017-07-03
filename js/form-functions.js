function addMessage(msg) {
	$('.messages').append('<li>' + msg + '</li>');
}

function clearMessages() {
	$('.messages').html('');
}
