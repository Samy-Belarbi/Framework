<?php

/* Point d'entrée de l'application */

// Démarrage de la session
session_start();

// Chargement des fonctions utilitaires
require 'helpers.php';

// Autoloader
// Fonction appelée lorsque l'on essaie d'instancier une classe
spl_autoload_register(function ($className) {
    // On change le sens des \ en /
    $fileName = str_replace('\\', '/', $className);
    
    // On inclut le fichier
    require "src/$fileName.php";
});

// Mise en place d'un routeur
$route = $_SERVER['PATH_INFO'] ?? '/';

// Récupération des routes de l'application
$routes = require 'config/routes.php';

if (isset($routes[$route])) {
    list($controllerName, $method) = $routes[$route];
    
    // Instanciation magique du contrôleur
    $controller = new $controllerName();
    $controller->$method();
} else {
    // Page 404
    header("HTTP/1.1 404 Not Found");
    require 'src/App/View/404.phtml';
    exit();
}