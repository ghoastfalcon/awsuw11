<?php
	require('Search.php');
	
	if(!$_GET['lat'] || !$_GET['lng'] || !$_GET['range']) {
		$retval = array ('success' => false, 'message' => 'Missing lat, lng, or range');
		echo json_encode ( $retval );
		exit;
	}
	
	$Search = new Search;
	
	
	$agencies = $Search->results($_GET['lat'], $_GET['lng'], $_GET['range']);
	
	$exist = array();
	$reformatted = array();
	
	foreach($agencies->result as $agency) {
		$agency = (array) $agency;
		$agency_id = (string) $agency['agencyid'];
		if(array_key_exists ($agency_id, $reformatted)) {
			$reformatted[$agency_id]['needs'][] = array ('id' => $agency['needId'], 'title' => $agency['needTitle'] );
		}
		else {
			$reformatted[$agency_id] = array ( 
							'agencyid' => $agency['agencyid'],
							'agencyName' => $agency['agencyName'],
							'agencystate' => $agency['agencystate'],
							'phone' => $agency['phone'],
							'agencyaddress' => $agency['agencyaddress'],
							'agencycity' => $agency['agencycity'],
							'agencyzip' => $agency['agencyzip'],
							'distance' => $agency['distance'],
							'category' => $agency['category'],
							'email' => $agency['email'],
							'description' => $agency['agencyName'],
							'longitude' => $agency['longitude'],
							'latitude' => $agency['latitude'],
							'needs' => array()
					);
				
			$reformatted[$agency_id]['needs'][] = array ( 'id' => $agency['needId'], 'title' => $agency['needTitle'] );
		}
	}
	echo json_encode ( $reformatted );
	exit;

?>