<?php

class ApiResponse {
	public $data;
	public $error;

	public function __construct() {
        $this->data = null;
        $this->error = new ApiError();
    }
}

class ApiError {
	public $errorMessage;
	public $fields;

	public function __construct() {
        $this->errorMessage = null;
        $this->fields = null;
    }
}

?>