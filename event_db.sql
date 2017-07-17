DROP DATABASE IF EXISTS event_db;

CREATE DATABASE event_db;

USE event_db;

CREATE TABLE `user` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(64) NOT NULL,
    bio VARCHAR(64) NOT NULL,
    avatar BLOB,
    age DATE NOT NULL,
    mail VARCHAR(64) NOT NULL,
    password VARCHAR(64) NOT NULL,
);

CREATE TABLE `post` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu VARCHAR(1064) NOT NULL,
    date DATE NOT NULL,
    auteur VARCHAR(64) NOT NULL,
    discipline VARCHAR(64) NOT NULL, 
    titre VARCHAR(64) NOT NULL,
    tags VARCHAR(1056) NOT NULL,
    upvotes INT,
    downvotes INT 
);

CREATE TABLE `comment` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenu VARCHAR(1064) NOT NULL,
    date DATE NOT NULL,
    auteur VARCHAR(64) NOT NULL,
    upvotes INT,
    downvotes INT 
);


/* Créer les liens entre les tables
CREATE TABLE album_member (album_id INT NOT NULL, member_id INT NOT NULL, 
FOREIGN KEY (album_id) REFERENCES album(id), FOREIGN KEY (member_id) REFERENCES member(id),
PRIMARY KEY (album_id, member_id));