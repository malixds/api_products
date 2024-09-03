<?php

namespace Repository\IphoneRepository;

use Entities\Iphone;
use Interfaces\IphoneInterface\IphoneInterface;

class IphoneRepository implements IphoneInterface
{
    protected Iphone $iphone;
    protected const TABLE = 'iphones';

    public function __construct()
    {
        $this->iphone = new Iphone();
    }

    public function find()
    {
        $sql = "SELECT * FROM " . self::TABLE . " WHERE id = 1";
        $statement = $this->iphone->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public function get()
    {
        $sql = "SELECT * FROM " . self::TABLE;
        $statement = $this->iphone->pdo->prepare($sql);
        $statement->execute();
        return $statement;
    }

    public function save($data): void
    {
        foreach ($data['products'] as $iphone) {
            $sql = "INSERT INTO  " . self::TABLE . " (id, title, description, price, discountPercentage, rating, stock, brand, category)
                    VALUES (:id, :title, :description, :price, :discountPercentage, :rating, :stock, :brand, :category) ON CONFLICT (id) DO NOTHING;";
            $statement = $this->iphone->pdo->prepare($sql);
            $statement->execute([
                ':id' => $iphone['id'],
                ':title' => $iphone['title'],
                ':description' => $iphone['description'],
                ':price' => $iphone['price'],
                ':discountPercentage' => $iphone['discountPercentage'],
                ':rating' => $iphone['rating'],
                'stock' => $iphone['stock'],
                ':brand' => $iphone['brand'],
                ':category' => $iphone['category']
            ]);
        }
    }
}