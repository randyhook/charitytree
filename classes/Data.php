
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

	public function getTotalRecords( $tableName, $criteria = array() ) {

		$returnResult = Flight::Result();

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

} // Data class
?>
