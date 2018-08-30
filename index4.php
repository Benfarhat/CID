<?php
use Symfony\Component\Debug\Debug;

require 'vendor/autoload.php';



Debug::enable();


$containerBuilder = new \DI\ContainerBuilder();

$containerBuilder->useAutoWiring(true); // à false tout pête sans le addDefinitions
$containerBuilder->ignorePhpDocErrors(true);
$containerBuilder->addDefinitions('config.php');

$container = $containerBuilder->build();

/* 
S'il n'y a pas de configuration on peut directement faire

$container = new DI\Container();

*/

/*

// On initialise PDO pour les besoins du controller
$pdo = new PDO('mysql:host=localhost;dbname=testDI', 'root', '');
$container->set(PDO::class, $pdo);
*/
// Innjection a toutes la classe
// $container->get(App\BlogController::class)->index();

// Avec call il fait de l'injection de dépendence en regardant la signature de la méthode index()
$container->call([\App\BlogController::class, 'index']);

/*
echo "<h2>Avec PHP/DI conteneur d'injection de dépendance et AutoWiring</h2><hr>";
echo '<a href="index.php">Sans PHP DI</a><br>';
echo '<a href="index2.php">َAvec PHP DI sans AutoWiring</a><br>';
echo '<a href="index3.php">َAvec PHP DI avec AutoWiring</a><br>';
*/