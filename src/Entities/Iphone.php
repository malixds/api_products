<?php

namespace Entities;

class Iphone extends Base
{
    protected string $table = 'iphones';

    public function __construct(
        int $id = 0,
        string $title = '',
        string $description = '',
        float $price = 0.0,
        float $discountPercentage = 0.0,
        float $rating = 0.0,
        int $stock = 0,
        string $brand = '',
        string $category = ''
    )
    {
        parent::__construct();
    }

}