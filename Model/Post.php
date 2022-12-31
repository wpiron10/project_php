<?php

class Post extends Table
{
    public $id;
    public $title;
    public $content;
    public $date;
    public $image_url;
    public $author;
    public $num_comments;

    public function __construct()
    {
		$table_name = 'posts';
		$primary_key_field_name = 'id';
		$fields_names = ['title','content','date', 'image_url', 'author', 'num_comments']; 
		parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
