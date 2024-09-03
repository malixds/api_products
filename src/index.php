<?php

use Api\ProductApi;
use Repository\IphoneRepository\IphoneRepository;
require __DIR__ . '/vendor/autoload.php';

$iphoneRepository = new IphoneRepository();
$iphone = new ProductApi($iphoneRepository);
$iphone->saveDataToDb();
$iphoneData = $iphone->getDataFromDb();
var_dump($iphoneData);

