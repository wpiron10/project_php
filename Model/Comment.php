<?php

class Comment extends Table
{
    public $id;
    public $post_id;
    public $author;
    public $content;
    public $date;

    public function __construct()
    {
		$table_name = 'comments';
		$primary_key_field_name = 'id';
		$fields_names = ['post_id','author','content', 'date']; 
		parent::__construct($table_name, $primary_key_field_name, $fields_names);
    }
}
