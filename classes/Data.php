
<?php

class Data {

	private $_dbHost;
	private $_dbName;
	private $_dbUser;
	private $_dbPass;

	private $_pdo;

	function __construct() {

		$this->_dbHost = 'localhost';
		$this->_dbName = 'charitytree';
		$this->_dbUser = 'root';
		$this->_dbPass = '';

		$this->_pdo = new PDO( "mysql:host={$this->_dbHost};dbname={$this->_dbName}", $this->_dbUser, $this->_dbPass );

	} // __construct()
 
	public function createUser( $email, $password, $role ) {

		$returnResult = Flight::Result(false);

		// Filter variables
		$e = filter_var( $email, FILTER_SANITIZE_EMAIL );
		if ( !$e ) {
			$returnResult->addError( 'Email did not sanitize.' );
			return $result;
		}

		$p = filter_var( $password, FILTER_SANITIZE_STRIPPED );
		if ( !$p ) {
			$returnResult->addError( 'Password did not sanitize.' );
			return $result;
		}
		$p = password_hash( $p, PASSWORD_DEFAULT );

		$r = filter_var( $role, FILTER_SANITIZE_STRIPPED );
		if ( !$r ) {
			$returnResult->addError( 'Role did not sanitize.' );
			return $result;
		}

		$statement = $this->_pdo->prepare( "INSERT INTO users (email, password, role, status) VALUES (:email, :password, :role, 'active')" );
		$exResult = $statement->execute( [ 'email' => $e, 'password' => $p, 'role' => $r ] );
		
		if ( !$exResult ) {
			$returnResult->addDbError( $statement );
			return $returnResult;
		}

		return $this->getUserByEmail( $e );

	}

	public function getTotalRecords( $tableName, $criteria = array() ) {

		$returnResult = Flight::Result(false);

		$t = filter_var( $tableName, FILTER_SANITIZE_STRIPPED );
		if ( !$t ) {
			$returnResult->addError( 'Table name did not sanitize.' );
			return $returnResult;
		}

		$statement = $this->_pdo->prepare( "SELECT COUNT(*) FROM $t" );
		$exResult = $statement->execute();

		if ( !$exResult ) {
			$returnResult->addDbError( $statement );
			return $returnResult;
		}

		$fetchResult = $statement->fetch( PDO::FETCH_ASSOC );

		if ( !$fetchResult ) {
			$returnResult->addDbError( $statement );
			return $returnResult;
		}

		$returnResult->addSuccessData( intval( $fetchResult[ 'COUNT(*)' ] ) );
		
		return $returnResult;

	}

	public function getUserByEmail( $email ) {

		$returnResult = Flight::Result(false);

		$e = filter_var( $email, FILTER_SANITIZE_EMAIL );
		if ( !$e ) {
			$returnResult->addError( 'Email did not sanitize.' );
			return $result;
		}

		$statement = $this->_pdo->prepare( "SELECT * FROM users WHERE email = :email" );
		$exResult = $statement->execute( [ 'email' => $e ] );

		if ( !$exResult ) {
			$returnResult->addDbError( $statement );
			return $returnResult;
		}

		$returnResult->setSuccessFail( true );

		if ( $statement->rowCount() > 0 ) {

			$fetchResult = $statement->fetch( PDO::FETCH_ASSOC );
				
			if ( !$fetchResult ) {
				$returnResult->addDbError( $statement );
				return $returnResult;
			}

			$returnResult->addSuccessData( $fetchResult );
			
		}
		
		return $returnResult;

	} // getUserByEmail()

} // Data class
?>
