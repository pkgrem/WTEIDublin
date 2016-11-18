<?php 

	include('references.php');

	$businesses = [];

	/* 

	**************************************
	UNCOMMENT ME WHEN QUERY LIMIT IS RESET

	// foreach ($group_reference_ids as $food_group => $reference_ids) {
	// 	foreach ($reference_ids as $index => $reference_id) {
	//		//assigns reference id to grab business data for
	// 		$google_places->reference = $reference_id;
	//		//business data
	// 		$business_details = $google_places->details();
	// 		foreach ($business_details as $details) {
	// 			if (isset($business_details['result'])) {
	//				//store only the data we want in an array and categorises it under it's respective food group
	// 				$businesses[$food_group][$details['id']] = array (
	// 					'name' => $details['name'],
	// 					'open_now' => $details['opening_hours']['open_now'],
	// 					'opening_hours' => $details['opening_hours']['weekday_text'],
	// 					'rating' => $details['rating'],
	// 					'map_url' => $details['url'],
	// 					'website' => $details['website']
	// 				);
	// 			}
	// 		}
	// 	}
	// }
	
	**************************************
	*/

	/*
	**************************************
	COMMENT ME OUT WHEN QUERY LIMIT IS RESET
	*/
	foreach ($groups as $group) {
		$businesses[$group][] = array (
			'name' => 'name',
			'open_now' => 1,
			'opening_hours' => 'hours',
			'rating' => 4.2,
			'map_url' => 'url',
			'website' => 'https://www.google.ie'
		);
	}
	//*************************************

?>