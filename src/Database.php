<?php

namespace App;

class Database {

    private $pdo;

    public function __construct(string $dbname, string $username, string $password, string $host)
    {
       $this->pdo = new \PDO("mysql:dbname=$dbname;host=$host", $username, $password);
       // dump($this->pdo->query('SELECT * from posts')->fetchAll());
    }

    public function fetchAll(string $query):array {

        $result = $this->pdo->query($query);
        if ($result) {
            return $result->fetchAll(\PDO::FETCH_COLUMN);
        }
        else {
             return [];
        }

        //return $this->pdo->query($query)->fetchAll();
    }

    public function getPDO():\PDO {
        return $this->pdo;
    }
}