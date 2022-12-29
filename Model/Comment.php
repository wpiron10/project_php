<?php

class Comment extends Table
{
	public function __construct()
	{
		$table_name = 'comment';
		$primary_key_field_name = 'orderNumber';
		$fields_names = ['post_id','author','body']; 
		parent::__construct($table_name, $primary_key_field_name, $fields_names);
	}
}

  function get_all_comments()
{
	// retourne un tableau d'instances de la classe Film cotenant les infos de tout les comments
	$lines = my_fetch_array("select * from comments");

    $fields_names = ['post_id','author','body']; 
	$comments_objects = [];
	foreach ($lines as $line)
	{
		$comment = new Comment;
		$comment->post_id = $line['post_id'];
		$comment->author = $line['author'];
		$comment->body = $line['body'];
		$comments[] = $comment;
	}
	return $comments;
}
$posts = get_all_comments();


