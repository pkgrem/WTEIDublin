<?php 

	require_once __DIR__ . '/groups.php';
	require_once __DIR__ . '/php-googleplaces/src/GooglePlaces.php';
	require_once __DIR__ . '/php-googleplaces/src/GooglePlacesClient.php';

	$group_reference_ids = [];

	//API that queries google places API
	//paramater is API Key
	$google_places = new joshtronic\GooglePlaces('AIzaSyCLUvYOG7sIIqLSzLz43uSIZzeswUDYglQ');

	//Co-ordinates for Dublin City Centre
	$google_places->location = array(53.350140, -6.266155);
	//Radius around city centre
	$google_places->radius = 5000;

	$google_places->type = 'restaurant';

	foreach ($groups as $food_type) {
		//passes in each food group from groups.php as a keyword search 
		$google_places->keyword = $food_type;
		//retrieves google api reference id needed for business data
		$group_references = $google_places->radarSearch();
		foreach ($group_references['results'] as $reference) {
			//stores each id under it's respective food group
			$group_reference_ids[$food_type][] = $reference['reference'];
		}
	}

?>