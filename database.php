<?php
// database.php

// Établissement de la connexion
$conn = mysqli_connect('localhost', 'root', '', 'projetphp');

// Vérifiez la connexion
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

// Fonction de déconnexion
function db_disconnect() {
  global $conn;
  if (isset($conn)) {
    mysqli_close($conn);
  }
}



// function my_query($query)
// {
// 	global $link;
// 	mysqli_report(MYSQLI_REPORT_OFF);

// 	if (empty($link))
// 	$link = @mysqli_connect('localhost', 'root', '', 'small_business');

// 	if (!$link)
// 		die("Failed to connect to MySQL: " . mysqli_connect_error());

// 	$result = @mysqli_query($link, $query);
// 	if (!$result)
// 		die("Failed to execute MySQL query: " . mysqli_error($link));

// 	return $result;
// }