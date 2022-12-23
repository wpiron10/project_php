<?php

require_once('./table.class.php'); // classe mere de l'ORM
require_once('./Model/Order.php'); // un exemple de classe fille de l'ORM (comme Film, ou Genre)
require_once('./Model/Employee.php'); 

// routing
if (!isset($_GET['page'])) // index.php
	$page = 'home';
else
	$page = $_GET['page']; // index.php?page=une_autre_action


// controller : à voir si on le mets dans le controleur.php (Mvc)
if ($page == 'home') // accueil du site
{
	// ici on est dans une ACTION
	// dans une action on :
	//  - utilise le model (ORM) pour recuperer ou inserer des données dans la base
	//	- inclue ou appelle une vue pour display/render du html

	// utuliser le modele pour recuperer tout les orders
	include('View/home.phtml');
	$orders = Order::getAll();
}
elseif($page == 'orders') // pour afficher orders
{
	include('View/orders.phtml');
	$orders = Order::getAll();
}
elseif($page == 'employees') // pour afficher employees
{
	include('View/employees.phtml');
	$orders = Employee::getAll();
}



// elseif($page == 'showPost') // pour recevoir le formulaire de post
// {
// 	$post_id = $_GET['post_id'];
// 	$posts = Post::getOne($post_id);
// 	include('templates/home.php')
// }

// elseif($page == 'post') // pour recevoir le formulaire de post
// {
// 	$post = new Post();
// 	$post->content = $_POST['post_content'];
// 	$post->save();
// 	//
// 	$posts = Post::getAll();
// 	include('templates/home.php')
// }

// elseif($page == 'comment') // pour recevoir le formulaire de commentare
// {

// }
// elseif($page == 'login') // pour recevoir le formulaire de login
// {

// }
// elseif($page == 'signup') // pour recevoir le formulaire d'inscription
// {

// }