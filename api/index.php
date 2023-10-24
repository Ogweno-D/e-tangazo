<?php
// Include a file using an absolute path
require '/xampp/htdocs/e-tangazo/loadenv.php';

//This is the  actual API documentation.

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 15,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "mobile": "0707298098",
    "response_type": "json",
    "sender_name": "23107",
    "service_id": 0,
    "message": "This is a message.\n\nRegards\nMobitech Technologies"
}',
  CURLOPT_HTTPHEADER => array(
    'h_api_key: api_key',
    'Content-Type: application/json'
  ),));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>