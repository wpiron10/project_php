<?php

$path = "../";
require_once('./controller.php');

$comment = new Comment;
$comment->post_id = $_POST["post_id"]; ;
$comment->author = $_POST["author"];
$comment->content = $_POST["content"];

$date = new DateTime();
$formatted_date = $date->format('Y-m-d');
$comment->date = $formatted_date;


$comment->save();

header('Location: ../index.php?route=comments&post_id='.$_POST["post_id"]);
exit;