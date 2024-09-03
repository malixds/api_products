<?php

namespace Db;

use Exception;
use PDO;
use PDOException;

final class Database
{

    private static ?Database $instance = null;
    private ?PDO $pdo = null;

    /**
     * @throws Exception
     */
    public function connect(): void
    {

        $params = parse_ini_file('db.ini');
        if ($params === false) {
            throw new Exception('Проблема с параметрами для бд');
        }
        $conStr = sprintf(
            "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            $params['host'],
            $params['port'],
            $params['database'],
            $params['user'],
            $params['password']
        );
        $this->pdo = new PDO($conStr);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Подключение к базе данных и возврат объекта PDO.
     * @return PDO
     * @throws Exception
     */
    public function getPdo(): PDO
    {
        if ($this->pdo === null) {
            $this->connect();
        }
        return $this->pdo;
    }

    /**
     * @return PDO|null
     * @throws Exception
     */
    public static function getConnection(): ?PDO
    {
        $database = Database::getInstance();
        return $database->getPdo();
    }
    protected function __construct()
    {
    }
}