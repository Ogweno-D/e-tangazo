<?php

// //Assuming you have an array of mobile numbers from your database
// $mobileNumbers = ["1234567890", "9876543210", "5555555555"];

// //Iterate through each mobile number
// foreach ($mobileNumbers as $mobileNumber) {
//     //Initialize cURL session
//     $curl = curl_init();

//    // Set cURL options
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => '',
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 15,
//         CURLOPT_FOLLOWLOCATION => true,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => json_encode(array(
//             "mobile" => $mobileNumber,
//             "response_type" => "json",
//             "sender_name" => "23107",
//             "service_id" => 0,
//             "message" => "This is a message.\n\nRegards\nMobitech Technologies"
//         )),
//         CURLOPT_HTTPHEADER => array(
//             'h_api_key: api_key',
//             'Content-Type: application/json'
//         ),
//     ));

//     // Execute cURL request
//     $response = curl_exec($curl);

//     // Check for errors
//     if ($response === false) {
//         echo 'Curl error: ' . curl_error($curl) . PHP_EOL;
//     } else {
//         echo 'Response for mobile ' . $mobileNumber . ': ' . $response . PHP_EOL;
//     }

//     // Close cURL session
//     curl_close($curl);
// }
?>

<?php
// Include a file using an absolute path
 require '/xampp/htdocs/e-tangazo/loadenv.php';
// $secret_key = $api_key;
require '../vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
$username   = "Ogweno";
$apiKey     = $api_key;

print_r($apiKey);

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

$pdo = require __DIR__ ."./../database/dbconn.php";

    // Fetch mobile numbers from the database 
    $stmt = $pdo->prepare("SELECT phone FROM tangazo");
    $stmt = $pdo->prepare(" SELECT phone FROM admin");
    $stmt->execute();
    $recipients = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Set the numbers you want to send to in international format
//$recipients = "+25470729XXX";

// Set your message
$message    = "Hi, There is a new tangazo. Please click the link below to review and tangaza https://etangazo.com.\n\n Regards E-tangazo team";

// Set your shortCode or senderId
//  $from       = "2001";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        // 'from'    => $from
        
    ]);
    // print_r($result);
    header('Location: ./../index.php  '); 
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}