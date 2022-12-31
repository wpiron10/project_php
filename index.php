<?php

require_once('./Controller/controller.php'); 


// Routing
$route = isset($_GET['route']) ? $_GET['route'] : 'home';
$use_template = true;

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
elseif($route == 'post')
{
    // Affiche un article de blog (index.php?route=post&post_id=2)
    $post_id = $_GET['post_id'];
    $post = Post::getOne($post_id);
    $view = './View/Posts/post.phtml';
}
elseif($route == 'comments')
{
    // Liste de tous les commentaires d'un article de blog (index.php?route=comments&post_id=2)
    $post_id = $_GET['post_id'];
    $comments = Comment::getAllByRestrict('post_id', $post_id);
    $view = './View/Comments/comments.phtml';
}
elseif($route == 'comment')
{
    // Affiche un commentaire de blog (index.php?route=comment&comment_id=2)
    $comment_id = $_GET['comment_id'];
    $comment = Comment::getOne($comment_id);
    $view = './View/Comments/comment.phtml';
}
elseif($route == 'user_posts')
{
    // Liste de tous les articles de blog d'un utilisateur (index.php?route=user_posts&user_name=Charlie)
    $user_name = $_GET['user_name'];
    $posts = Post::getAllByRestrict('author', $user_name);
    $view = './View/Posts/posts.phtml';
}
elseif($route == 'new_post')
{
    $view = './View/Posts/newpost.phtml';
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
