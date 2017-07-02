<?php

class Admin {

	public static function installCheck() {

		$returnResult = Flight::Result();

		Flight::register( 'User', 'User' );
		$totalUsersResult = User::getTotalUsers();
		
		if ( $totalUsersResult->isSuccess() ) {

			if ( $totalUsersResult->getSuccessData()[0] == 0 ) {

				$returnResult->setSuccessFail( true );

			}
			else {

				$returnResult->addError( 'The application has already been installed.' );

			}

		}
		else {

			$returnResult->addErrors( $totalUsersResult->getErrors() );

		}

		return $returnResult;

	}

} // Admin class

?>
