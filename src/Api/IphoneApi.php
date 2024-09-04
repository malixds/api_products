<?php

namespace Api;

use PDO;
use Repository\IphoneRepository\IphoneRepository;
class IphoneApi extends ProductApi
{
    private IphoneRepository $iphoneRepository;

    public function __construct(IphoneRepository $iphoneRepository, $data)
    {
        $this->iphoneRepository = $iphoneRepository;
        parent::__construct($data);
    }


    public function getDataFromApi() // может быть добавить параметр "нужный продукт"
    {
        return json_decode($this->data, true);
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

    public function getOneProduct($id): false|array
    {
        return $this->iphoneRepository->find($id);
    }
}