<?php

/* So I've changed quite a bit in this API fetch, I've written down the main changes here and commented the code where necessary:

- From what I understood from the API documents, the API version you're using with city names has been depericated, the newer API version works with longitute and latitidues (Version 3), so would requrie a bridge (not a problem today but could be tomorrow but something to consider in the future). 

- I've moved the API key out of the main public folder. If we were working together on the same server, I'd make it available as an environment variable, but taking the direct reference to the API code out of the public file is a good second best given contraints.

- The URL construction wasn't generalised enough, were we to build this out to work with other cities like "New York", where there is a gap in the letters, the get request would fail do to spaces in the URL. I've employed the urlencode() function as a solution. 

- I've added metric units to the query string, because the default Kelvins just doesn't make common sense. Who walks around thinking about the world in Kelvins? 

- Rather than use the file_get_contents function, I've updated to use curl because it offers better secuirty with "default" SSL checks to make sure the site is secure. While it offers default protection, sometimes the default settings vary depending on your version of PHP, so I've added SSL verification settings just in case. 

- More often than not, things don't go to plan with API requests, so I've added a bit of basic error handling: both in terms of the request and the whether the data portion of the response went through ok. 

*/

$new = require "../apicreds/creds.php";


// Set your OpenWeatherMap API key
$apiKey = $new["apiKey"];

// Set the city you want to get the weather for
$city = 'London';

// Construct the API URL
$url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=" . urlencode($apiKey) . "&units=metric";

// Initialize curl session
$ch = curl_init();

// Set curl options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Enable SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

// Execute curl session
$response = curl_exec($ch);

// Check for errors
if (curl_error($ch)) {
  echo 'Error: ' . curl_error($ch);
} else {
  // Decode JSON response
  $data = json_decode($response);

  // Check if data retrieval was successful
  if ($data->cod == 200) {
    // Weather data retrieved successfully
    $weather = $data->weather[0]->description;
    $temperature = $data->main->temp;
    echo "Weather in {$city}: $weather, Temperature: $temperature °C";
  } else {
    // Error retrieving weather data
    echo "Error: Unable to retrieve weather data.";
  }
}

// Close curl session
curl_close($ch);
