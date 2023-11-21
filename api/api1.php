<?php
// Include a file using an absolute path
// require '/xampp/htdocs/e-tangazo/loadenv.php';
// $secret_key = $api_key;
require './vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

// Set your app credentials
// $username   = "Sandbox";
// $apiKey     = '';

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

$pdo = require __DIR__ ."./../database/dbconn.php";

// Fetch mobile numbers from the database 
// $stmt = $pdo->prepare("SELECT phone FROM tangazo");
$stmt = $pdo->prepare(" SELECT phone FROM admin");
$stmt->execute();
$recipients = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Set the numbers you want to send to in international format
// $recipients = "+254711XXXYYY,+254733YYYZZZ";

// Set your message
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Set your shortCode or senderId
$from       = "myShortCode or mySenderId";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        'from'    => $from
    ]);

    print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}