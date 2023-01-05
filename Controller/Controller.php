<?php
// Classe mere de l'ORM
require_once('./ORM/table.class.php');
// Classe filles de l'ORM
require_once('./Model/comment.php');
require_once('./Model/post.php'); 
// Base de données
require_once './database.php';


// Chargement du contrôleur et de la vue correspondant à la route
if ($route == 'home')
{
    // Accueil du site (index.php?route=home ou index.php)
    $view = './View/Home/home.phtml';
}
elseif($route == 'posts')
{
    // Liste de tous les articles de blog (index.php?route=posts)
    $posts = Post::getAll();
    $view = './View/Posts/posts.phtml';
}
elseif($route == 'post' && isset($_GET['post_id']))
{
    // Affiche un article de blog (index.php?route=post&post_id=2)
    $post_id = $_GET['post_id'];
    $post = Post::getOne($post_id);

    if (empty($post->title))
	{
		header("HTTP/1.0 404 Not Found");
		exit;
	}
    else
        $view = './View/Posts/post.phtml';
}
elseif($route == 'comments' && isset($_GET['post_id']))
{
    // Liste de tous les commentaires d'un article de blog (index.php?route=comments&post_id=2)
    $post_id = $_GET['post_id'];
    $comments = Comment::getAllByRestrict('post_id', $post_id);

    $post = Post::getOne($post_id);
    if (empty($post->title))
	{
		header("HTTP/1.0 404 Not Found");
		exit;
	}
    else
        $view = './View/Comments/comments.phtml';
}
elseif($route == 'comment' && isset($_GET['comment_id']))
{
    // Affiche un commentaire de blog (index.php?route=comment&comment_id=2)
    $comment_id = $_GET['comment_id'];
    $comment = Comment::getOne($comment_id);

    if (empty($comment->content))
	{
		header("HTTP/1.0 404 Not Found");
		exit;
	}
    else
        $view = './View/Comments/comment.phtml';
}
elseif($route == 'user_posts' && (isset($_POST['user_name']) || isset($_GET['user_name'])))
{
    // Liste de tous les articles de blog d'un utilisateur (index.php?route=user_posts&user_name=Charlie)
    $user_name = isset($_GET['user_name']) ? $_GET['user_name'] : $_POST['user_name'];
    $posts = Post::getAllByRestrict('author', $user_name);

    if (empty($posts[0]->title))
	{
		header("HTTP/1.0 404 Not Found");
		exit;
	}
    else
        $view = './View/Posts/posts.phtml';
}
elseif($route == 'new_post')
{
    // Ajouter un article (index.php?route=new_post)
    $view = './View/Posts/newpost.phtml';
}
elseif($route == 'newpostsave')
{
    $post = new Post;
    $post->title = str_replace("'", "''", $_POST["title"]);
    $post->content = str_replace("'", "''", $_POST["content"]);
    $post->image_url = $_POST["image_url"];
    $post->author = str_replace("'", "''", $_POST["author"]);
    $post->num_comments = 0;

    $date = new DateTime();
    $formatted_date = $date->format('Y-m-d');
    $post->date = $formatted_date;

    $post->save();

    header('Location: ./index.php?route=posts');
    exit;
}
elseif($route == 'newcomment' && isset($_GET['post_id']))
{
    // Ajouter un commentaire à un article (index.php?route=newcomment&post_id=2)
    $post_id = $_GET['post_id'];

    $post = Post::getOne($post_id);
    if (empty($post->title))
	{
		header("HTTP/1.0 404 Not Found");
		exit;
	}
    else
        $view = './View/Comments/newcomment.phtml';
}
elseif($route == 'newcommentsave')
{
    $comment = new Comment;
    $comment->post_id = $_POST["post_id"];
    $comment->author = str_replace("'", "''", $_POST["author"]);
    $comment->content = str_replace("'", "''", $_POST["content"]);

    $date = new DateTime();
    $formatted_date = $date->format('Y-m-d');
    $comment->date = $formatted_date;

    $comment->save();

    header('Location: ./index.php?route=comments&post_id='.$_POST["post_id"]);
    exit;
}
else
{
    // Page 404 car le routing ne correspond à rien (index.php?route=lorem)
    header("HTTP/1.0 404 Not Found");
    $use_template = false;
}

if ($use_template)
{
    // Chargement du template
    include './View/template.phtml';
}