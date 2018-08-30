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

    public function __construct(B $b, C $c){ // Via l'autowiring il va comprendre qu'il faut une instance de B et C
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

echo "<h2>Avec PHP/DI conteneur d'injection de dépendance et AutoWiring</h2><hr>";
echo '<a href="index.php">Sans PHP DI</a><br>';
echo '<a href="index2.php">َAvec PHP DI sans AutoWiring</a><br>';
echo '<a href="index4.php">َCas réel avec PDO</a><br>';

$container = \DI\ContainerBuilder::buildDevContainer();


// var_dump($container->get(C::class)); // Récupérer instance de C
// var_dump($container->get(B::class)); // Récupérer instance de B

// Plus besoin d'instancier C et B, via l'autowiring il va pouvoir les instancier

var_dump($container->get(A::class)->the_world());