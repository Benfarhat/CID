<?php
namespace App;

class BlogController {


    public function index(PostTable $post) {
        $posts = $post->findAll();
        dump($posts);
    }

    public function index2(Database $database) {
        $posts = $database->fetchAll('SELECT * from posts');
        dump($posts);
    }

    public function demo() { // Pas besoin de PDO pourtant on l'instancie
        dump('demo');
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