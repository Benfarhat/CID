<?php
namespace App;

class BlogController {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $posts = $this->pdo->query('SELECT * from posts')->fetchAll();
        var_dump($posts);
    }

}