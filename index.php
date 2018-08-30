<?php

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

echo "<h2>Sans conteneur d'injection de dépendance</h2><hr>";
echo '<a href="index2.php">Avec PHP DI</a><br>';
echo '<a href="index3.php">َAvec PHP DI et AutoWiring</a><br>';
echo '<a href="index4.php">َCas réel avec PDO</a><br>';

$c = new C();
$b = new B();
$a = new A($b, $c);

var_dump($a->the_world());