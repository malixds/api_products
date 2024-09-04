<?php

namespace Api;

abstract class ProductApi
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    abstract public function getDataFromApi();

}