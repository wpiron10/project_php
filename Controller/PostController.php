<?php

class PostController {
  public function index() {
    // Récupération de la liste des articles de blog à partir du modèle
    $posts = Post::find();

    // Affichage de la vue de la liste des articles de blog
    require_once 'View/index.php';
  }

  public function view($id) {
    // Récupération de l'article de blog individuel à partir du modèle
    $post = Post::find($id);

    // Récupération de la liste des commentaires pour l'article de blog à partir du modèle
    $comments = Comment::findByPostId($id);

    // Affichage de la vue de l'article de blog individuel
    require_once 'View/view.php';
  }

  public function create() {
    // Traitement du formulaire de création d'un article de blog
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Création de l'article de blog à partir des données du formulaire
      $post = new Post();
      $post->title = $_POST['title'];
      $post->body = $_POST['body'];
      $post->save();

      // Redirection vers la page de visualisation de l'article de blog
      header("Location: index.php?c=post&a=view&id=$post->id");
      exit;
    }

    // Affichage de la vue de création d'un article de blog
    require_once 'View/create.php';
  }
}
