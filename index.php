<?php

require_once('./ORM/table.class.php'); // classe mere de l'ORM
require_once('./Model/Comment.php'); // un exemple de classe fille de l'ORM (comme Film, ou Genre)
require_once('./Model/Post.php'); 
// Inclusion du fichier de connexion à la base de données
// include 'database.php';

include './Controller/Controller.php';

// Déconnexion de la base de données - Edit : a voir dans un T2
// db_disconnect();
