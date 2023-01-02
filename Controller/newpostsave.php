<?php

$path = "../";
require_once('./controller.php');

$post = new Post;
$post->title = $_POST["title"];
$post->content = $_POST["content"];
$post->image_url = $_POST["image_url"];
$post->author = $_POST["author"];
$post->num_comments = 0;

$date = new DateTime();
$formatted_date = $date->format('Y-m-d');
$post->date = $formatted_date;

$post->save();

header('Location: ../index.php?route=posts');
exit;