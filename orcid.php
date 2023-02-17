<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');

use GuzzleHttp\Client; // set namespace for GuzzleHttp

require_once('vendor/autoload.php'); // load composer autoload

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // fetch env variables

$dotenv->load();

$client_id          = $_ENV["CLIENT_ID"];           // Insert your data
$client_secret      = $_ENV["CLIENT_SECRET"];       // Insert your data
$bearer_token       = $_ENV["BEARER_TOKEN"];        // Insert your data
$record_url         = $_ENV["RECORD_URL"];          // Insert your data


$requestData = [    // build request
    'debug' => false,
    'query' => [
        "client_id" => $client_id,
        "client_secret" => $client_secret,
    ],
    'headers' => [
        'Authorization' => "Bearer " . $bearer_token,
        'Content-Type' => 'application/x-www-form-urlencoded',
        'Accept' => 'application/json'
    ]
    
];

$client = new Client([]);

$response = $client->request('GET', $record_url, $requestData);

die($response->getBody()->getContents()); // echo result in JSON format

?>