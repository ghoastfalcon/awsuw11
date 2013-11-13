<?php
	require('Search.php');
	
	if(!$_GET['lat'] || !$_GET['lng'] || !$_GET['range']) {
		$retval = array ('success' => false, 'message' => 'Missing lat, lng, or range');
		echo json_encode ( $retval );
		exit;
	}
	
	$Search = new Search;
	
	
	$agencies = $Search->results($_GET['lat'], $_GET['lng'], $_GET['range']);
	echo json_encode ( $agencies );
	exit;

?>