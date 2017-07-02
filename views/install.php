<?php

if ( count( $checkResult->getErrors() ) == 0 ) {
	echo "Ready to install.";
}
else {
	echo "The application has already been installed.";
}

?>
