<?php

class Result {

	private $_successFail = false;
	private $_successData = null;
	private $_errorMessages = array();

	public function addDbError( $pdoStatement ) {

		if ( !empty( $pdoStatement->errorInfo()[2] ) ) {
			$this->addError( $pdoStatement->errorInfo()[2] );
		}
		else {
			$this->addError( 'Internal database error.' );
		}

	}

	public function addError( $errorMsg ) {

		$this->_errorMessages[] = $errorMsg;

	}

	public function addErrors( $errorMessages ) {

		if ( is_array( $errorMessages ) ) {

			array_merge( $errorMessages, $this->_errorMessages );

		}

	}

	public function addSuccessData( $data ) {

		$this->_successData[] = $data;

	}

	public function getErrors() {

		return $this->_errorMessages;

	}

	public function getSuccessData() {

		return $this->_successData;
	}

	public function isSuccess() {

		return $this->_successFail || count( $this->_successData ) > 0;

	}

	public function setSuccessFail( $setter ) {

		$this->_successFail = ( bool ) $setter;
	
	}

} // Result class

?>
