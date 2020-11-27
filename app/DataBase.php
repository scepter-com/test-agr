<?php


namespace app;

use PDO;

class DataBase
{
    private $pdo;

    /**
     * @return PDO
     */
    public function getPDO()
    {
        return $this->pdo;
    }

    /**
     * DataBase constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $host = '###';
        $db = '###';
        $user = '###';
        $password = '###';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try
        {
            $this->pdo = new PDO($dsn, $user, $password, $opt);
        }
        catch (PDOException $e)
        {
            echo 'Подключение не удалось: ' . $e->getMessage();
            exit;
        }
    }
}