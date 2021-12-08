DROP DATABASE IF EXISTS ProjetCMSW2;
CREATE DATABASE IF NOT EXISTS ProjetCMSW2 CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS ProjetCMSW2.author (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    isAdmin BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS ProjetCMSW2.post (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    postDate DATETIME NOT NULL,
    authorId INT UNSIGNED NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS ProjetCMSW2.comment (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    content TEXT NOT NULL,
    commentDate DATETIME NOT NULL,
    authorId INT UNSIGNED NOT NULL,
    postId INT UNSIGNED NOT NULL,
    PRIMARY KEY (id)
    );

INSERT INTO ProjetCMSW2.author (username, isAdmin, password, email)
VALUES ('domino', 1, 'domino', 'martin@sionfamily.com');
INSERT INTO ProjetCMSW2.author (username, isAdmin, password, email)
VALUES ('zeubimaru', 0, 'zeubimaru', 'zeubimaru@zeubimaru.com');

INSERT INTO ProjetCMSW2.post (title, content, postDate, authorId)
VALUES ('Premier Post', 'Lorem ipsum', NOW(), 1);
INSERT INTO ProjetCMSW2.post (title, content, postDate, authorId)
VALUES ('Deuxième Post', 'Lorem ipsum  tadaaa', NOW(), 2);
