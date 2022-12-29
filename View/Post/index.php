<?php

<h1>Liste des articles de blog</h1>

<?php foreach ($posts as $post): ?>
  <h2><?php echo $post->title; ?></h2>
  <p><?php echo $post->body; ?></p>
<?php endforeach; ?>
