CREATE TABLE t_produit (
id INT PRIMARY KEY AUTO_INCREMENT,
nom varchar(50) NOT NULL,
categorie1 varchar(80) NOT NULL,
categorie2 varchar(80) DEFAULT NULL,
prix float(8) NOT NULL,
image varchar(255) NOT NULL,
UNIQUE (nom));

INSERT INTO t_produit
(nom, prix, categorie1, categorie2, image)
VALUES
('Cookie pomme et piment', 9.5, 'cookies', '', "photo/content/cookie/cookie_piment_pomme.png"),
('Cookie coco', 9.7, 'cookies', '', "photo/content/cookie/cookie_coco.png"),
('Cookie beurre de cacahuete', 9.2, 'cookies', '', "photo/content/cookie/cookie_cacahuete.png"),
('Cookie aux eclats de chocolat', 8.5, 'cookies', '', "photo/content/cookie/cookie_eclat_chocolat.png"),
('Cookie caramel', 10, 'cookies', '', "photo/content/cookie/cookie_caramel.png"),
('Cookie creme de cerise', 8, 'cookies', '', "photo/content/cookie/cookie_cerise.png"),
('Cookie chocolat noisettes', 8.5, 'cookies', '', "photo/content/cookie/cookie_noisette_choco.png"),
('Cookie tarte au chocolat', 9.3, 'cookies', '', "photo/content/cookie/cookie_tarte_choco.png"),
('Panier de course avec liseret blanc', 25, 'paniers', '', "photo/content/recipient/panier avec liseret blanc.png"),
('Corbeille en osier blanc rectangulaire', 29, 'corbeilles', '', "photo/content/recipient/corbeille blanche rectangulaire.png"),
('demi cacahuette', 23, 'paniers', '', 'photo/content/recipient/demi cacahuette.png'),
('panier rectangulaire avec liseret rouge', 30, 'paniers', '', 'photo/content/recipient/panier avec liserai rouge.png'),
('panier de ma grand mere', 16, 'paniers', '', 'photo/content/recipient/panier de ma grand merre.png'),
('panier du petit chaperont rouge', 22, 'paniers', '', 'photo/content/recipient/panier du petit chaperon rouge.png'),
('corbeille doublee avec coussin', 24, 'corbeilles', '', 'photo/content/recipient/panier confortable.png'),
('corbeille moche', 17, 'corbeilles', '', 'photo/content/recipient/corbeille moche.png'),
('grosse corbeille ovale avec assortiment de cookies', 50, 'corbeilles', 'cookies', 'photo/content/recipent_et_cookie/grosse corbeille ovale avec assortiment de cookies.png'),
('panier et ses cookies au chocolat ', 75, 'paniers', 'cookies', 'photo/content/recipent_et_cookie/panier et ses cookies au chocolat .png'),
("petite corbeille d'halloween", 35, 'corbeilles', 'cookies', "photo/content/recipent_et_cookie/petite corbeille d_halloween.png");

CREATE TABLE t_categorie (
id INT PRIMARY KEY AUTO_INCREMENT,
nom varchar(20) NOT NULL,
UNIQUE (nom));

INSERT INTO t_categorie
(nom)
VALUES
('cookies'),
('paniers'),
('corbeilles');

CREATE TABLE t_paniers (
id INT PRIMARY KEY AUTO_INCREMENT,
id_produit INT NOT NULL,
login varchar(20) NOT NULL,
quantite INT NOT NULL);


CREATE TABLE t_users (
id INT PRIMARY KEY AUTO_INCREMENT,
login varchar(20) NOT NULL,
prenom varchar(50) NOT NULL,
nom varchar(20) NOT NULL,
adresse_de_livraison varchar(255) NOT NULL,
mot_de_passe varchar(128),
UNIQUE (login));

CREATE TABLE t_achats (
id_commande INT PRIMARY KEY AUTO_INCREMENT,
id_produit INT NOT NULL,
login varchar(20) NOT NULL,
quantite int(8) NOT NULL);

CREATE TABLE t_admin (
id INT PRIMARY KEY AUTO_INCREMENT,
login varchar(20) NOT NULL,
prenom varchar(50) NOT NULL,
nom varchar(20) NOT NULL,
mot_de_passe varchar(128),
UNIQUE (login));
