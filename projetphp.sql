CREATE DATABASE projetphp;

USE projetphp;

ALTER DATABASE projetphp DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

CREATE TABLE posts (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  date DATE NOT NULL,
  image_url VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  num_comments INT(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);

CREATE TABLE comments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  post_id INT(11) NOT NULL,
  author VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  date DATE NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (post_id) REFERENCES posts(id)
);

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  num_posts INT(11) NOT NULL DEFAULT 0,
  num_comments INT(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
);

INSERT INTO users (name, num_posts, num_comments) VALUES
('Alice', 1, 4),
('Bob', 1, 3),
('Charlie', 2, 4),
('Eve', 0, 4),
('Frank', 1, 4),
('Greta', 1, 4),
('Hannah', 1, 4),
('Ivy', 0, 4),
('Jared', 0, 3),
('Karen', 0, 3);

INSERT INTO posts (title, content, date, image_url, author, num_comments) VALUES
('Comment organiser son temps de travail', 'Voici quelques astuces pour mieux gérer son temps de travail...', '2022-01-01', 'https://alchimistedelajoie.com/wp-content/uploads/2018/12/business-camera-coffee-1509428-reduit-1080x675.jpg', 'Alice', 3),
('5 conseils pour améliorer sa productivité', 'Voici cinq conseils simples pour améliorer sa productivité au travail...', '2022-01-02', 'https://static.jobat.be/uploadedImages/pictures/chaos-bureau-large(1).jpg', 'Bob', 4),
('Comment bien se reposer la nuit', 'Voici quelques astuces pour mieux dormir la nuit et se reposer...', '2022-01-03', 'https://cdn.futura-sciences.com/buildsv6/images/largeoriginal/8/c/4/8c4d40dcca_50172983_bien-dormir-olga-adobe-stock.jpg', 'Charlie', 7),
('Les bienfaits de la marche quotidienne', 'Voici pourquoi il est important de marcher tous les jours et comment en tirer le maximum de bienfaits...', '2022-01-04', 'https://i.notretemps.com/1800x0/smart/2021/04/27/marcher-mon-plaisir-sante.jpeg', 'Charlie', 6),
('Les secrets de la méditation', 'Voici comment méditer et les bienfaits de la pratique sur le corps et l''esprit...', '2022-01-05', 'https://www.yogajournalfrance.fr/wp-content/uploads/2015/08/Les-bienfaits-de-la-m%C3%A9ditation.jpg', 'Frank', 3),
('Les bienfaits de la pleine conscience', 'Voici comment pratiquer la pleine conscience et les bienfaits de cette pratique sur le corps et l''esprit...', '2022-01-06', 'https://images.radio-canada.ca/q_auto,w_960/v1/ici-info/16x9/cerveau-conscience-illustration.jpg', 'Greta', 4),
('Les avantages de la méthode Pomodoro', 'Voici comment utiliser la méthode Pomodoro pour améliorer sa productivité et ses résultats...', '2022-01-07', 'https://www.sciencesetavenir.fr/assets/img/2016/01/05/cover-r4x3w1000-57e17c4960b1b-comment-l-enfant-acquiert-il-la-notion-du-temps.jpg', 'Hannah', 8);

INSERT INTO comments (post_id, author, content, date) VALUES
(1, 'Charlie', 'Très intéressant, merci pour ces astuces !', '2022-01-01'),
(1, 'Eve', 'Je vais essayer de mettre ces conseils en pratique !', '2022-01-02'),
(1, 'Frank', 'Je trouve que ces conseils sont très utiles, merci beaucoup !', '2022-01-02'),
(2, 'Greta', 'Ces conseils sont vraiment pratiques, merci pour ce partage !', '2022-01-02'),
(2, 'Hannah', 'Je vais essayer de mettre ces conseils en pratique dès demain !', '2022-01-02'),
(2, 'Ivy', 'Très utile, merci pour ces précieux conseils !', '2022-01-03'),
(2, 'Jared', 'Je pense que ces conseils vont vraiment m''aider à améliorer ma productivité !', '2022-01-03'),
(2, 'Karen', 'Je vais essayer de mettre en pratique ces conseils et je vous tiendrais au courant des résultats !', '2022-01-03'),
(3, 'Alice', 'Très intéressant, merci pour ces astuces !', '2022-01-03'),
(3, 'Bob', 'Je pense que ces conseils vont vraiment m''aider à mieux dormir la nuit !', '2022-01-10'),
(3, 'Charlie', 'Je vais essayer de mettre ces conseils en pratique dès ce soir !', '2022-01-18'),
(3, 'Eve', 'Je trouve que ces conseils sont très utiles, merci beaucoup !', '2022-01-19'),
(3, 'Frank', 'Je vais essayer de mettre en pratique ces conseils et je vous tiendrais au courant des résultats !', '2022-01-19'),
(3, 'Greta', 'Ces conseils sont vraiment pratiques, merci pour ce partage !', '2022-01-22'),
(3, 'Hannah', 'Je pense que ces conseils vont vraiment m''aider à mieux dormir la nuit !', '2022-01-23'),
(4, 'Ivy', 'Très utile, merci pour ces précieux conseils !', '2022-01-07'),
(4, 'Jared', 'Je vais essayer de mettre ces conseils en pratique dès demain !', '2022-01-10'),
(4, 'Karen', 'Ces conseils sont vraiment pratiques, merci pour ce partage !', '2022-01-11'),
(4, 'Alice', 'Je trouve que ces conseils sont très utiles, merci beaucoup !', '2022-01-22'),
(4, 'Bob', 'Je vais essayer de mettre en pratique ces conseils et je vous tiendrais au courant des résultats !', '2022-01-24'),
(4, 'Charlie', 'Je pense que ces conseils vont vraiment m''aider à mieux dormir la nuit !', '2022-01-24'),
(5, 'Eve', 'Très intéressant, merci pour ces astuces !', '2022-01-10'),
(5, 'Frank', 'Je vais essayer de mettre ces conseils en pratique !', '2022-01-14'),
(5, 'Greta', 'Je trouve que ces conseils sont très utiles, merci beaucoup !', '2022-01-14'),
(6, 'Hannah', 'Ces conseils sont vraiment pratiques, merci pour ce partage !', '2022-01-07'),
(6, 'Ivy', 'Je vais essayer de mettre ces conseils en pratique dès demain !', '2022-01-07'),
(6, 'Jared', 'Très utile, merci pour ces précieux conseils !', '2022-01-07'),
(6, 'Karen', 'Je vais essayer de mettre en pratique ces conseils et je vous tiendrais au courant des résultats !', '2022-01-08'),
(7, 'Alice', 'Je pense que ces conseils vont vraiment m''aider à améliorer ma productivité !', '2022-01-09'),
(7, 'Bob', 'Très intéressant, merci pour ces astuces !', '2022-01-10'),
(7, 'Charlie', 'Je vais essayer de mettre ces conseils en pratique !', '2022-01-12'),
(7, 'Eve', 'Je trouve que ces conseils sont très utiles, merci beaucoup !', '2022-01-13'),
(7, 'Frank', 'Ces conseils sont vraiment pratiques, merci pour ce partage !', '2022-01-18'),
(7, 'Greta', 'Je vais essayer de mettre ces conseils en pratique dès demain !', '2022-01-21'),
(7, 'Hannah', 'Très utile, merci pour ces précieux conseils !', '2022-01-21'),
(7, 'Ivy', 'Je vais essayer de mettre en pratique ces conseils et je vous tiendrais au courant des résultats !', '2022-01-23');
