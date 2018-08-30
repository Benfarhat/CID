<?php

namespace App;

class PostTable {

    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function findAll() {
        return $this->database->fetchAll('SELECT * FROM posts');
    }
}