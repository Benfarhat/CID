<?php
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\Debug;

require 'vendor/autoload.php';



Debug::enable();


class TestA {
    public    $prop1  = 1;
    protected $prop2  = 2;
    private   $prop3  = 3;
}

class TestB {
    public    $prop1  = 1;
    protected $prop2  = 2;
    private   $prop3  = 3;

    function __construct() {
        print "Appel à partir du constructeur\n";
    }

    public function test(TestA $param1, String $var2){
        return true;
    }
}

$test = new TestB();

$reflect = new ReflectionClass($test);




// Les propriétés de la classe

$props1   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);

dump($props1);


// Les paramètres d'une méthode dans la classe
$props2 = $reflect->getMethod('test')->getParameters();

dump($props2);

// Les paramètres contenant une clé TypeHint peuvent être approfondis comme suit

foreach($props2 as $p){

    dump($p->getClass());

}

// Le constructeur de la classe

// ------------------------------------------------------

$props3 = $reflect->getConstructor()->getParameters();


dump($reflect->getConstructor());
dump($props3);