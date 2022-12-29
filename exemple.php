<?php
// blog.php

// Inclusion du fichier de connexion à la base de données
include 'database.php';

// Exécution d'une requête sur la base de données
$result = mysqli_query($conn, 'SELECT * FROM posts');

// Parcours du résultat et affichage des données
while ($row = mysqli_fetch_assoc($result)) {
  echo $row['title'] . '<br>';
  echo $row['body'] . '<br>';
}

// Déconnexion de la base de données
db_disconnect();
