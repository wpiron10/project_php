<?php

// Inclusion du fichier de connexion à la base de données
include 'database.php';

// Définition de la route courante
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Chargement du contrôleur et de la vue correspondant à la route
switch ($route) {
  case 'home':
    $controller = 'HomeController';
    $action = 'index';
    break;
  case 'posts':
    $controller = 'PostsController';
    $action = 'index';
    break;
  case 'post':
    $controller = 'PostsController';
    $action = 'show';
    break;
  case 'comments':
    $controller = 'CommentsController';
    $action = 'index';
    break;
  case 'comment':
    $controller = 'CommentsController';
    $action = 'show';
    break;
  default:
    $controller = 'ErrorsController';
    $action = 'notFound';
    break;
}

// Inclusion du contrôleur
include "controllers/$controller.php";

// Instanciation du contrôleur et appel de l'action
$controller = new $controller();
$controller->$action();

// Déconnexion de la base de données
db_disconnect();
