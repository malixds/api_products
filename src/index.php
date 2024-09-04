<?php

use Api\IphoneApi;
use Factories\ProductFactory;
use Repository\IphoneRepository\IphoneRepository;
require __DIR__ . '/vendor/autoload.php';

$URL = 'https://dummyjson.com/products/search?q=phone';
parse_str(parse_url($URL, PHP_URL_QUERY), $queryParams);
$type = $queryParams['q'] ?? null;
$data = file_get_contents($URL);

try {
    $product = ProductFactory::create($type, $data);
    $product->saveDataToDb();
    $productData = $product->getDataFromDb();
    $productOne = $product->getOneProduct(104);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

var_dump($productOne);
