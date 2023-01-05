<?php

$path = "../";
require_once('./controller.php');

$post = new Comment;
$post->post_id = $_POST["post_id"]; ;
$post->author = $_POST["author"];
$post->content = $_POST["content"];


$date = new DateTime();
$formatted_date = $date->format('Y-m-d');
$post->date = $formatted_date;


$post->save();

header('Location: ../index.php?route=posts');
exit;