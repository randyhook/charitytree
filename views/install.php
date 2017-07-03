<div class="container">

<?php

if ( count( $checkResult->getErrors() ) == 0 ) {
?>

<p>Ready to begin installation.</p>

<div class="input-field">
	<input id="superuser-email" type="text" placeholder="Email">
	<label for="superuser-email">Superuser email</label>
</div>

<div class="input-field">
	<input id="superuser-password" type="password" placeholder="Password">
	<label for="superuser-password">Superuser password</label>
</div>

<ul class="messages">
</ul>

<a id="start-install" class="waves-effect waves-light btn">Start install</a>

<?php
}
else {
	echo "The application has already been installed.";
}

?>

</div>
