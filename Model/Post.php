<?php


class Post extends Table
{
	public function __construct()
	{
		$table_name = 'posts';
		$primary_key_field_name = 'orderNumber';
		$fields_names = ['title', 'body']; 
		parent::__construct($table_name, $primary_key_field_name, $fields_names);
	}
}



  function get_all_posts()
{
	// retourne un tableau d'instances de la classe Film cotenant les infos de tout les posts
	$lines = my_fetch_array("select * from posts");

	$fields_names = ['title', 'body']; 
	$posts_objects = [];
	foreach ($lines as $line)
	{
		$post = new Post;
		$post->title = $line['title'];
		$post->body = $line['body'];
		$posts[] = $post;
	}
	return $posts;
}
$posts = get_all_posts();


// class Post {
//   public $id;
//   public $title;
//   public $body;

//   public static function find($id) {
//     $db = Db::getInstance();
//     $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
//     $req->execute(array('id' => $id));
//     return $req->fetch();
//   }

//   public static function findAll() {
//     $db = Db::getInstance();
//     $req = $db->query('SELECT * FROM posts');
//     return $req->fetchAll();
//   }

//   public function save() {
//     $db = Db::getInstance();
//     if ($this->id) {
//       // Mise à jour de l'article de blog existant
//       $req = $db->prepare('UPDATE posts SET title = :title, body = :body WHERE id = :id');
//       $req->execute(array(
//         'title' => $this->title,
//         'body' => $this->body,
//         'id' => $this->id
//       ));
//     } else {
//       // Création d'un nouvel article de blog
//       $req = $db->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)');
//       $req->execute(array(
//         'title' => $this->title,
//         'body' => $this->body
//       ));
//       $this->id = $db->lastInsertId();
//     }
//   }
// }