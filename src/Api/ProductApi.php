<?php

namespace Api;

use PDO;
use Repository\IphoneRepository\IphoneRepository;
class ProductApi
{

    private IphoneRepository $iphoneRepository;

    public function __construct(IphoneRepository $iphoneRepository)
    {
        $this->iphoneRepository = $iphoneRepository;
    }
    public function getDataFromApi() // может быть добавить параметр "нужный продукт"
    {
        $apiUrl = 'https://dummyjson.com/products/search?q=iPhone';
        $response = file_get_contents($apiUrl);
        return json_decode($response, true);

    }

    public function saveDataToDb(): void
    {
        $data = $this->getDataFromApi();
        $this->iphoneRepository->save($data);
    }
    public function getDataFromDb(): false|array
    {
        $statement = $this->iphoneRepository->get();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}