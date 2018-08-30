<?php

require 'vendor/autoload.php';

$a = new \App\BlogController();
/*

$containerBuilder = new \DI\ContainerBuilder();

$containerBuilder->useAutoWiring(true);

$container = $containerBuilder->build();

var_dump($container->get(new App\BlogController()));

/*

*/

//$container->get(App\BlogController::class)->index();

echo "<h2>Avec PHP/DI conteneur d'injection de dépendance et AutoWiring</h2><hr>";
echo '<a href="index.php">Sans PHP DI</a><br>';
echo '<a href="index2.php">َAvec PHP DI sans AutoWiring</a><br>';
echo '<a href="index3.php">َAvec PHP DI avec AutoWiring</a><br>';