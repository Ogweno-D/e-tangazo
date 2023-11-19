<?php

//Assuming you have an array of mobile numbers from your database
$mobileNumbers = ["1234567890", "9876543210", "5555555555"];

//Iterate through each mobile number
foreach ($mobileNumbers as $mobileNumber) {
    //Initialize cURL session
    $curl = curl_init();

   // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array(
            "mobile" => $mobileNumber,
            "response_type" => "json",
            "sender_name" => "23107",
            "service_id" => 0,
            "message" => "This is a message.\n\nRegards\nMobitech Technologies"
        )),
        CURLOPT_HTTPHEADER => array(
            'h_api_key: api_key',
            'Content-Type: application/json'
        ),
    ));

    // Execute cURL request
    $response = curl_exec($curl);

    // Check for errors
    if ($response === false) {
        echo 'Curl error: ' . curl_error($curl) . PHP_EOL;
    } else {
        echo 'Response for mobile ' . $mobileNumber . ': ' . $response . PHP_EOL;
    }

    // Close cURL session
    curl_close($curl);
}
?>