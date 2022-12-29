CREATE TABLE posts (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  title TEXT NOT NULL,
  body TEXT NOT NULL
);

CREATE TABLE comments (
  id INTEGER PRIMARY KEY AUTO_INCREMENT,
  post_id INTEGER NOT NULL,
  author TEXT NOT NULL,
  body TEXT NOT NULL,
  FOREIGN KEY(post_id) REFERENCES posts(id)
);

-- TODO - ajouter à posts : date_publication, publisher_name, image_url, reading_time, comments_number
INSERT INTO posts (title, body) VALUES ('Article 1', 'Contenu de l''article 1'); 
INSERT INTO posts (title, body) VALUES ('Article 2', 'Contenu de l''article 2');
INSERT INTO posts (title, body) VALUES ('Article 3', 'Contenu de l''article 3');
INSERT INTO posts (title, body) VALUES ('Article 4', 'Contenu de l''article 4');
INSERT INTO posts (title, body) VALUES ('Article 5', 'Contenu de l''article 5');

-- TODO - ajouter à posts : comment_date
INSERT INTO comments (post_id, author, body) VALUES (1, 'Auteur 1', 'Commentaire 1 pour l''article 1');
INSERT INTO comments (post_id, author, body) VALUES (1, 'Auteur 2', 'Commentaire 2 pour l''article 1');
INSERT INTO comments (post_id, author, body) VALUES (2, 'Auteur 3', 'Commentaire 1 pour l''article 2');
INSERT INTO comments (post_id, author, body) VALUES (3, 'Auteur 4', 'Commentaire 1 pour l''article 3');
INSERT INTO comments (post_id, author, body) VALUES (3, 'Auteur 5', 'Commentaire 2 pour l''article 3');
INSERT INTO comments (post_id, author, body) VALUES (4, 'Auteur 6', 'Commentaire 1 pour l''article 4');
INSERT INTO comments (post_id, author, body) VALUES (4, 'Auteur 7', 'Commentaire 2 pour l''article 4');
INSERT INTO comments (post_id, author, body) VALUES (4, 'Auteur 8', 'Commentaire 3 pour l''article 4');
INSERT INTO comments (post_id, author, body) VALUES (5, 'Auteur 9', 'Commentaire 1 pour l''article 5');

