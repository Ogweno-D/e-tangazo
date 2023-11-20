<?php
// Include a file using an absolute path
require '/xampp/htdocs/e-tangazo/loadenv.php';
// $secret_key = $api_key;

$pdo = require __DIR__ ."./../database/dbconn.php";

// Fetch mobile numbers from the database 
// $stmt = $pdo->prepare("SELECT phone FROM tangazo");
$stmt = $pdo->prepare(" SELECT phone FROM admin");
$stmt->execute();
$mobileNumbers = $stmt->fetchAll(PDO::FETCH_COLUMN);

// print_r($mobileNumbers);

// Print the fetched mobile numbers
// foreach ($mobileNumbers as $mobileNumber) {
//     echo $mobileNumber ."\n";
// }
//Iterate through each mobile number
foreach ($mobileNumbers as $mobileNumber) {

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
  CURLOPT_POSTFIELDS =>json_encode(array(
    "mobile" => $mobileNumber,
    "response_type" => "json",
    "sender_name" => "23107",
    "service_id" => 0,
    "message" => "Welcome to E-tangazo.\n Thank you for trusting us,we will get back to you in a moment \n Regards \n E-tangazo"
)),
  CURLOPT_HTTPHEADER => array(
    "h_api_key: $api_key",
    'Content-Type: application/json'
  ),));

// $response = curl_exec($curl);
// curl_close($curl);

// header('Location: ./../index.php  ');
// echo $response;

// Execute cURL request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    echo 'Curl error: ' . curl_error($curl) . PHP_EOL;
} else {
    // echo $response;

    // Redirect to the home page after successful API request
   header('Location: ./../index.php  '); 
}

//Close cURL session
curl_close($curl);
}

?>



