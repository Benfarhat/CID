<?php

require 'vendor/autoload.php';


class C {

    public function hey(): string{
        return 'Hey!';
    }
}

class B {

    public function hello(): string {
        return 'hello';
    }
}

class A {

    private $b;
    private $c;

    public function __construct(B $b, C $c){
        $this->b = $b;
        $this->c = $c;
    }

    public function the_world(): string  {
        return $this->c->hey()
        . ' '
        . $this->b->hello() 
        . ' the world';
    }
}

echo "<h2>Avec PHP/DI conteneur d'injection de dépendance</h2><hr>";
echo '<a href="index.php">Sans PHP DI</a><br>';
echo '<a href="index3.php">َAvec PHP DI et AutoWiring</a><br>';
echo '<a href="index4.php">َCas réel avec PDO</a><br>';

$container = \DI\ContainerBuilder::buildDevContainer();

$container->set('c', new C());
$container->set('b', new B());

// var_dump($container->get('c')); // Récupérer instance de C
// var_dump($container->get('b')); // Récupérer instance de B

$container->set('a', new A($container->get('b'), $container->get('c')));

var_dump($container->get('a')->the_world());