<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

// Api setup
$products_url = 'https://api.veeqo.com/products';
$headers = [
    'headers' => [
        'x-api-key' => ' 47314188b7c041054cc54d0324794aea',
        'Accept' => 'application/json'
    ]
];

// Get all products
$response = $client->request(
    'GET',
    $products_url,
    $headers
    );

$products = $response->getBody()->getContents();
$products = json_decode($products);

foreach ($products as $product) {
    highlight_string("<?php\n\$product =\n" . var_export($product, true) . ";\n?>");
}

