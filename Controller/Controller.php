<?php

require_once('./ORM/table.class.php'); // classe mere de l'ORM
require_once('./Model/Comment.php'); // un exemple de classe fille de l'ORM (comme Post, ou Comment)
require_once('./Model/Post.php'); 

// Routing
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Chargement du contrôleur et de la vue correspondant à la route
switch ($route) {
  case 'home':
  	include('./View/Home/home.phtml');
    $posts = Post::getAll();
    break;
  case 'posts':
    include('./View/Posts/posts.phtml');
    $action = Post::getAll();
    break;
  case 'comments':
    include('./View/Posts/comments.phtml');
    $action= Comment::getAll();
    break;
  case 'post':
    include('./View/Posts/posts.phtml'); // TODO : à modifier une post.phtml créée
    $action= Post::getOne();
    break;
  case 'comment':
    include('./View/Posts/comments.phtml'); // TODO : à modifier une comment.phtml créée
    $action= Comment::getOne();
  
    break;
  default:
    include('View/home.phtml'); // TODO : à modifier une comment.phtml créée
    $action = 'notFound';
    break;
}


