<?php

class Admin {

	public static function install( $data ) {

		$returnResult = Flight::Result(false);

		Flight::register( 'User', 'User' );
		$userResult = User::createUser( $data, true );

		if ( !$userResult->isSuccess() ) {
			return $returnResult;
		}

		return $returnResult;

	}

	public static function installCheck() {

		$returnResult = Flight::Result(false);

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
