<?php
// Routing
$route = isset($_GET['route']) ? $_GET['route'] : 'home';
$use_template = true; 

// Controlleur
require_once('./Controller/controller.php');