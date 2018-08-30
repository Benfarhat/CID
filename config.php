<?php

return [
    // Comment on instancie PDO
    // Pour comprendre: 
    // @see: https://github.com/PHP-DI/PHP-DI/issues/395

    // Si il y a une variable d'environnement depuis PHP, il faut l'utiliser
    'db.username' => \DI\env('db_username', 'root'),
    'db.password' => \DI\env('db_password', ''),
    'db.host' => \DI\env('db_host', 'localhost'),
    'db.name' => \DI\env('db_name', 'testDI'),
    /*
    // Attention pour PDO::__construct il y a une option final qui doit être renseignée
    // @see: http://php.net/manual/fr/pdo.construct.php
    PDO::class => \DI\create()->constructor('mysql:host=localhost;dbname=testDI', 'root', '', null),
    \App\BlogController::class => \DI\create()->constructor(\DI\get(PDO::class))
    */
    \App\Database::class => \DI\create()->constructor(
                                \DI\get('db.name'),
                                \DI\get('db.username'),
                                \DI\get('db.password'),
                                \DI\get('db.host')
    ),
    \PDO::class => \DI\factory([\App\Database::class, 'getPDO'])
];