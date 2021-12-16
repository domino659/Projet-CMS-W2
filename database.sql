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
    -- postImage TEXT NOT NULL,
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
VALUES ('domino', 1, '$2y$10$UUyENQL7hUlv7qTOTJQcK.uaBbsBB7h0kw1QxFTohUqsj4IJSoPVO', 'martin@sionfamily.com');
-- domino

INSERT INTO ProjetCMSW2.author (username, isAdmin, password, email)
VALUES ('zeubimaru', 0, '$2y$10$fIoR0fgbCT3z4PWz48IIu.ksGYkPNycSv6O/L3njBJmHmDdVAtaoS', 'zeubimaru@zeubimaru.com');
-- zeubimaru

INSERT INTO ProjetCMSW2.post (title, content, postDate, authorId)
VALUES ('Premier Post', 'Lorem ipsum', NOW(), 1);
INSERT INTO ProjetCMSW2.post (title, content, postDate, authorId)
VALUES ('Deuxieme Post', 'Lorem ipsum  tadaaa', NOW(), 2);

INSERT INTO ProjetCMSW2.comment (content, commentDate, authorId, postId)
VALUES ('zib zab zoub zoubida', NOW(), 1, 1);

INSERT INTO ProjetCMSW2.comment (content, commentDate, authorId, postId)
VALUES ('zongo le dozo', NOW(), 2, 2);