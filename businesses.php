<?php 

	include('references.php');

	$businesses = [];

	//queries the google places api for business data if we delete our local data in businesses.json
	if (!file_exists('businesses.json') || filesize('businesses.json') == 0) {
		foreach ($group_reference_ids as $food_group => $reference_ids) {
			foreach ($reference_ids as $index => $reference_id) {
				//assigns reference id to grab business data for
				$google_places->reference = $reference_id;
				//business data
				$business_details = $google_places->details();
				echo '<pre>' . print_r($business_details, true) . '</pre>';
				if (isset($business_details['result']['website'])) {
					//store only the data we want in an array and categorises it under it's respective food group
					$businesses[$food_group][$business_details['result']['id']] = array (
						'name' => isset($business_details['result']['name']) ? $business_details['result']['name'] : '',
						'open_now' => isset($business_details['result']['opening_hours']['open_now']) ? $business_details['result']['opening_hours']['open_now'] : '',
						'opening_hours' => isset($business_details['result']['opening_hours']['weekday_text']) ? $business_details['result']['opening_hours']['weekday_text'] : '',
						'rating' => isset($business_details['result']['rating']) ? $business_details['result']['rating'] : '',
						'map_url' => isset($business_details['result']['url']) ? $business_details['result']['url'] : '',
						'address' => isset($business_details['result']['formatted_address']) ? $business_details['result']['formatted_address'] : '',
						'phone' => isset($business_details['result']['formatted_phone_number']) ? $business_details['result']['formatted_phone_number'] : '',
						'website' => isset($business_details['result']['website']) ? $business_details['result']['website'] : ''
					);
				}
			}
		}
		$fp = fopen('businesses.json', 'w');
		fwrite($fp, json_encode($businesses));
		fclose($fp);
	//queries a local file that already contains business data
	//This is to increase performance and limit how often we ping google places api
	} else {
		$businesses = json_decode(file_get_contents('businesses.json'), true);
	}

?>