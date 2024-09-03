<?php

namespace Entities;

use Db\Database;
use Exception;
use PDO;

class Base
{
    private string $table = '';
    public PDO $pdo;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
    public function getTable()
    {
        return $this->table;
    }
}