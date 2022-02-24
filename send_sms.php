<?php

require 'vendor/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// Configure client
$config = Configuration::getDefaultConfiguration();
$config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTYzOTY1MTE0MCwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjkyMDA2LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.lPTgmVIR-RnDz2Z2OBr-lRcoy3Ppgi_5Nt-qQ_61eWE');
$apiClient = new ApiClient($config);
$messageClient = new MessageApi($apiClient);

if (isset($_POST["number"]) && isset($_POST["msg"])) {
    // Sending a SMS Message
    $sendMessageRequest2 = new SendMessageRequest([
        'phoneNumber' => $_POST["number"],
        'message' => $_POST["msg"],
        'deviceId' => 126644
    ]);
    $sendMessages = $messageClient->sendMessages([
        $sendMessageRequest2
		
    ]);
}


?>