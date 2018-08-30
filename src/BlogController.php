<?php
namespace App;

class BlogController {


    public function index(\PDO $pdo) {
        $posts = $pdo->query('SELECT * from posts')->fetchAll();
        var_dump($posts);
    }

    public function demo() { // Pas besoin de PDO pourtant on l'instancie
        var_dump('demo');
    }

}

/* 

// Ancienne classe qui sans iinjection de dep dans les fonctions
class BlogController {

    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function index() {
        $posts = $this->pdo->query('SELECT * from posts')->fetchAll();
        var_dump($posts);
    }

    public function demo() { // Pas besoin de PDO pourtant on l'instancie
        var_dump('demo');
    }

}
*/