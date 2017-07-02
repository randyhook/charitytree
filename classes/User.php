<?php

class User {

	public static function getTotalUsers() {

		$data = Flight::Data();
		$usersResult = $data->getTotalRecords( 'users' );

		return $usersResult;

	}

} // User class

?>
