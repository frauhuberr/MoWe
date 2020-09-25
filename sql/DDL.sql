DROP DATABASE IF EXISTS Movielibrary;
CREATE DATABASE IF NOT EXISTS Movielibrary;

USE Movielibrary;

CREATE TABLE genre (
    genre_pk int NOT NULL AUTO_INCREMENT,
    name varchar(20),
    PRIMARY KEY (genre_pk)
);

CREATE TABLE movie (
    movie_pk int NOT NULL AUTO_INCREMENT,
    name varchar(50),
    yearpublished int NOT NULL,
    producer varchar(50),
    imageURL varchar(250),
    description_short varchar(255),
    description varchar(1000),
    fsk int(2) NOT NULL,
    mainActor varchar(50),
    PRIMARY KEY (movie_pk)
);

CREATE TABLE userRank (
    rank_pk int NOT NULL AUTO_INCREMENT,
    name varchar(30),
    PRIMARY KEY (rank_pk)
);

CREATE TABLE movieUser (
    user_pk int NOT NULL AUTO_INCREMENT,
    firstName varchar(30),
    lastName varchar(30),
    password varchar(255),
    email varchar(30),
    rank_fk int,
    PRIMARY KEY (user_pk),
    FOREIGN KEY (rank_fk) REFERENCES userRank(rank_pk)
);

CREATE TABLE movieGenre (
    movieGenre_pk int NOT NULL AUTO_INCREMENT,
    movie_fk int,
    genre_fk int,
    PRIMARY KEY (movieGenre_pk),
    FOREIGN KEY (movie_fk) REFERENCES Movie(movie_pk),
    FOREIGN KEY (genre_fk) REFERENCES Genre(genre_pk)
);

CREATE TABLE hasRanked (
    hasRanked_pk int NOT NULL AUTO_INCREMENT,
    user_fk int,
    movie_fk int,
    userLike int NOT NULL,
    userDislike int NOT NULL,
    PRIMARY KEY (hasRanked_pk),
    FOREIGN KEY (user_fk) REFERENCES movieUser(user_pk),
    FOREIGN KEY (movie_fk) REFERENCES Movie(movie_pk)
);

CREATE TABLE userLOG (
    user_pk int NOT NULL AUTO_INCREMENT,
    firstName varchar(30),
    lastName varchar(30),
    password varchar(30),
    rank_fk int,
    date DATETIME,
    action varchar(20),
    PRIMARY KEY (user_pk),
    FOREIGN KEY (rank_fk) REFERENCES userRank(rank_pk)
);

CREATE TABLE movieLOG (
    movie_pk int NOT NULL AUTO_INCREMENT,
    name varchar(50),
    yearpublished int NOT NULL,
    producer varchar(50),
    imageURL varchar(250),
    description_short varchar(255),
    description varchar(1000),
    fsk int(2) NOT NULL,
    mainActor varchar(50),
    date DATETIME,
    action varchar(20),
    PRIMARY KEY (movie_pk)
);

INSERT INTO userRank(name) VALUES ('user'),('admin');
INSERT INTO movieUser(firstName, lastName, password, email, rank_fk) VALUES ('test', 'test', '$2y$10$myXM3XAY99jBr9Zg70.42OFqQ7N1.37VjBTRH.OBh7CFLnr/KxeP.', 'test@test.ch', 2);

INSERT INTO genre(name) VALUES ('romantic'), ('fantasy'), ('drama'), ('documentary'),('comedy'),('thriller'), ('animation'), ('action'),('musical');
INSERT INTO movie(name, yearpublished, producer, imageURL, description_short, description, fsk, mainActor) VALUES ('Test', 2011, 'test producer', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Test-Logo.svg/1200px-Test-Logo.svg.png', 'Dies ist ein Testfilm', 'In diesem Film geht es um nichts, er ist lediglich zum testen der Funktionen etc. da.', 18, 'Test actor')
