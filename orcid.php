<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');

error_log('Your message here');


use GuzzleHttp\Client;
//use Dotenv\Dotenv;

require_once('vendor/autoload.php');



$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();



$client_id          = $_ENV["CLIENT_ID"];
$client_secret      = $_ENV["CLIENT_SECRET"];
$bearer_token       = $_ENV["BEARER_TOKEN"];
$record_url         = $_ENV["RECORD_URL"];


$requestData = [
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

echo($response->getBody()->getContents());

?>