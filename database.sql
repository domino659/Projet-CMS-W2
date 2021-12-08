DROP DATABASE IF EXISTS ProjetCMSW2;
CREATE DATABASE IF NOT EXISTS ProjetCMSW2 CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS ProjetCMSW2.user (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    isAdmin BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS ProjetCMSW2.post (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    authorid INT UNSIGNED NOT NULL,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    postdate DATETIME NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS ProjetCMSW2.comment (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    postid INT UNSIGNED NOT NULL,
    authorid INT UNSIGNED NOT NULL,
    content TEXT NOT NULL,
    commentdate DATETIME NOT NULL,
    PRIMARY KEY (id)
    );

INSERT INTO ProjetCMSW2.user (username, isAdmin, password, email)
VALUES ('domino', 1, 'domino', 'martin@sionfamily.com');
INSERT INTO ProjetCMSW2.user (username, isAdmin, password, email)
VALUES ('zeubimaru', 0, 'zeubimaru', 'zeubimaru@zeubimaru.com');


DROP DATABASE IF EXISTS ProjetCMSW2;
CREATE DATABASE IF NOT EXISTS ProjetCMSW2 CHARACTER SET 'utf8';

CREATE TABLE IF NOT EXISTS ProjetCMSW2.user (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    isadmin BOOLEAN NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS ProjetCMSW2.post (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    authorid INT UNSIGNED NOT NULL,
    title VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    postdate DATETIME NOT NULL,
    PRIMARY KEY (id)
    );

CREATE TABLE IF NOT EXISTS ProjetCMSW2.comment (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    postid INT UNSIGNED NOT NULL,
    authorid INT UNSIGNED NOT NULL,
    content TEXT NOT NULL,
    commentdate DATETIME NOT NULL,
    PRIMARY KEY (id)
    );

INSERT INTO ProjetCMSW2.user (username, isadmin, password, email)
VALUES ('domino', 1, 'domino', 'martin@sionfamily.com');
INSERT INTO ProjetCMSW2.user (username, isadmin, password, email)
VALUES ('zeubimaru', 0, 'zeubimaru', 'zeubimaru@zeubimaru.com');

INSERT INTO ProjetCMSW2.post (authorid, title, content, postdate)
VALUES (1, 'Premier Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', NOW());
