<?php

namespace Factories;

use Api\IphoneApi;
use Exception;
use Repository\IphoneRepository\IphoneRepository;

class ProductFactory {
    /**
     * @throws Exception
     */
    public static function create($type, $data) {
        switch ($type) {
            case 'phone':
                $iphoneRepository = new IphoneRepository();
                return new IphoneApi($iphoneRepository, $data);

            case 'user':
                var_dump('hello');
//            case 'iphone':
//                return new IphoneApi($data);
            default:
                throw new Exception("Unknown product type");
        }
    }
}