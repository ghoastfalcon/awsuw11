<?php

class Search {
	
	private $_service_url = 'ec2-54-221-227-155.compute-1.amazonaws.com';
	private $_service_port = 8080;
	private $_socket;
	private $_socketError;
	
	public function __construct() {
		$this->_socket = null;
    }
	
	public function results ( $lat, $lng, $range ) {
		$retval = array();
		
		$in=$lat . ',' . $lng . ',' . $range . "\n";
		
		$result = $this->_createSocket();
		
		if($result) {
			
			socket_write($this->_socket, $in, strlen($in));
			
			$out = '';
			$all_out = '';
			while ($out = socket_read($this->_socket, 2048)) {
				$all_out .= $out;
			}
			socket_close($this->_socket);
			
			$retval = json_decode($all_out);
		}
		else {
			//echo $this->_socketError;
			//die;
		}
		
		return $retval;
	}
	
	private function _createSocket() {
		
		//$this->_socket = null;
		$retval = false;
		try {
			$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		}
		catch(Exception $e) {
			$this->_socketError = socket_strerror(socket_last_error($socket));
			//exit("socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");	
		}
		
		try {
			$result = socket_connect($socket, $this->_service_url, $this->_service_port);
			if($result) {
				$retval = true;
				$this->_socket = $socket;
			}
		}
		catch(Exception $e) {			
			$this->_socketError = socket_strerror(socket_last_error($socket));
			//exit("socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
		}
		
		return $retval;
	}
	
}