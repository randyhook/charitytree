<?php

class User {

	const ROLE_CLIENT = 'client';
	const ROLE_DONOR = 'donor';
	const ROLE_PROGRAM_MANAGER = 'program manager';
	const ROLE_SUPERUSER = 'superuser';

	const SESSION_LOGGED_IN_USER_ID = 'logged_in_user_id';
	const SESSION_LOGGED_IN_USER_EMAIL = 'logged_in_user_email';
	const SESSION_LOGGED_IN_USER_ROLE = 'logged_in_user_role';
	
	const STATUS_ACTIVE = 'active';
	const STATUS_BLOCKED = 'blocked';
	
	/**
	 * Create a user
	 *
	 * @param array $data Keys: email, password, role
	 * @param book $isSuperuser This is used to bypass Auth if we are creating a superuser during install
	 *
	 * @return Result
	 */
	public static function createUser( $userData, $isSuperuser = false ) {

		$returnResult = Flight::Result(false);

		// check permission
		//
		// if we are creating the superuser, bypass auth since nothing has been set up yet
		if ( !$isSuperuser ) {
			if ( !Auth::currentUserHasPermission( Auth::PERMISSION_CREATE_USER ) ) {
				$returnResult->addError( 'You are not authorized to create users.' );
				return $returnResult;
			}
		}
		
		// verify incoming data format
		if ( !is_array( $userData ) ) {
			$returnResult->addError( 'Data to create user is not in correct format.' );
			return $returnResult;
		}

		if ( $isSuperuser ) {
			$userData[ 'role' ] = User::ROLE_SUPERUSER;
		}

		foreach ( array( 'email', 'password', 'role' ) as $key ) {
			if ( !array_key_exists( $key, $userData ) ) {
				$returnResult->addError( 'Data to create user is not in correct format.' );
				return $returnResult;
			}
		}

		// make sure role is legit
		$roleExistsResult = User::roleExists( $userData[ 'role' ] );

		if ( !$roleExistsResult->isSuccess() ) {
			$returnResult->addErrors( $roleExistsResult->getErrors() );
			return $returnResult;
		}

		if ( !$roleExistsResult->getSuccessData()[0] ) {
			$returnResult->addError( 'The role: ' . $userData[ 'role' ] . ' does not exist.' );
			return $returnResult;
		}

		// check if user already exists
		$existsResult = User::userExists( $userData[ 'email' ] );

		if ( !$existsResult->isSuccess() ) {
			$returnResult->addErrors( $existsResult->getErrors() );
			return $returnResult;
		}

		if ( $existsResult->getSuccessData()[0] ) {
			$returnResult->addError( 'User with this email already exists.' );
			return $returnResult;
		}

		// create the user
		$data = Flight::Data(false);
		return $data->createUser( $userData[ 'email' ], $userData[ 'password' ], $userData[ 'role' ] );

	} // createUser()

	public static function getRoleList() {

		return array(
			User::ROLE_CLIENT => 'Client',
			User::ROLE_DONOR => 'Donor',
			User::ROLE_PROGRAM_MANAGER => 'Program Manager',
			User::ROLE_SUPERUSER => 'superuser'
		);

	} // getRoleList()

	public static function getTotalUsers() {

		$data = Flight::Data(false);
		$usersResult = $data->getTotalRecords( 'users' );

		return $usersResult;

	} // getTotalUsers()

	/**
	 * Log in a user
	 *
	 * @param array $postData [ 'email', 'password' ]
	 *
	 * @return Result
	 */
	public static function login( $postData ) {

		$returnResult = Flight::Result(false);

		session_destroy();

		// verify incoming data format
		if ( !is_array( $postData ) ) {
			$returnResult->addError( 'Data to log in user is not in correct format.' );
			return $returnResult;
		}

		foreach ( array( 'email', 'password' ) as $key ) {
			if ( !array_key_exists( $key, $postData ) ) {
				$returnResult->addError( 'Data to log in user is not in correct format.' );
				return $returnResult;
			}
		}

		// attempt to verify the user record
		$data = Flight::Data(false);
		$credsResult = $data->getUserByCreds( $postData[ 'email' ], $postData[ 'password' ] );

		// if successful
		if ( $credsResult->isSuccess() ) {

			// initialize session data
			$sData = $credsResult->getSuccessData()[0];
			$_SESSION[ User::SESSION_LOGGED_IN_USER_ID ] = $sData[ 'id' ];
			$_SESSION[ User::SESSION_LOGGED_IN_USER_EMAIL ] = $sData[ 'email' ];
			$_SESSION[ User::SESSION_LOGGED_IN_USER_ROLE ] = $sData[ 'role' ];

		}

		$returnResult = $credsResult;
		return $returnResult;

	} // login()

	public static function logout() {

		$returnResult = Flight::Result(false);

		session_destroy();

		return $returnResult;

	} // logout()

	public static function roleExists( $role ) {

		$returnResult = Flight::Result(false);

		$returnResult->addSuccessData( array_key_exists( $role, User::getRoleList() ) );

		return $returnResult;

	}

	public static function userExists( $email ) {

		$returnResult = Flight::Result(false);

		$data = Flight::Data(false);
		$userResult = $data->getUserByEmail( $email );

		if ( !$userResult->isSuccess() ) {
			$returnResult->addErrors( $userResult->getErrors() );
		}
		else {
			if ( count( $userResult->getSuccessData() ) > 0 ) {
				$returnResult->addSuccessData( true );
			}
			else {
				$returnResult->addSuccessData( false );
			}
		}

		return $returnResult;

	}

} // User class

?>
