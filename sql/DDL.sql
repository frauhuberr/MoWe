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
    email varchar(30),
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

INSERT INTO `movie` (`movie_pk`, `name`, `yearpublished`, `producer`, `imageURL`, `description_short`, `description`, `fsk`, `mainActor`) VALUES
(2, 'Der König der Löwen', 2019, 'Jon Favreau', 'https://media.services.cinergy.ch/media/box1600/1b447620341e5f4edd80ec6a3fd4b6c1bca4b0a4.jpg', 'Dem weisen Herrscherpaar Mufasa und Sarabi wird ein Thronfolger geboren. Löwenjunge Simba verbringt mit seiner Freundin Nala eine glückliche Kindheit.', 'Dem weisen Herrscherpaar Mufasa und Sarabi wird ein Thronfolger geboren. Löwenjunge Simba verbringt mit seiner Freundin Nala eine glückliche Kindheit unter der Sonne Afrikas, die jäh beendet wird, als Simbas machthungriger Onkel Scar eine böse Intrige gegen die Königsfamilie spinnt. Simba ist gezwungen, seine Heimat zu verlassen.', 0, 'none'),
(3, 'Hotel Artemis', 2018, 'Drew Pearce', 'https://media.services.cinergy.ch/media/raw/3ec57c4d05773883f2c58f4d96c60efc96923332.jpg', 'Das futuristische Los Angeles schreibt das Jahr 2028. Getarnt als ein Hotel betreibt die Krankenschwester Jean Thomas ein geheimes Krankenhaus.', 'Das futuristische Los Angeles schreibt das Jahr 2028. Getarnt als ein Hotel betreibt die Krankenschwester Jean Thomas ein geheimes Krankenhaus, in dem Kriminelle versorgt werden, ohne dass die Polizei darüber informiert wird. Allerdings gerät das System der Institution ins Wanken, als ein Gangster das Vertrauen der Einrichtung für seine eigenen Zwecke missbraucht und die Regel bricht, keine anderen Patienten zu töten.', 16, 'Jodie Foster'),
(4, 'ES Kapitel 2', 2019, 'AndrÃ©s Muschietti', 'https://www.filmfutter.com/wp-content/uploads/2019/09/EsKapitel2front-1280x720.jpg', 'Nach 27 Jahren wird die kleine Stadt Derry wieder von einer Mordserie heimgesucht.', 'Nach 27 Jahren wird die kleine Stadt Derry wieder von einer Mordserie heimgesucht. Dem Bibliothekar Mike Hanlon wird schnell bewusst, was los ist. Er kontaktiert seine ehemaligen Freunde vom Club der Verlierer. Die leben inzwischen alle woanders.', 16, 'Jessica Chastain'),
(5, 'Jurassic Park', 1993, 'Steven Spielberg', 'https://media.services.cinergy.ch/media/raw/52c3702080523f75adee695a4de2d6162d4ad993.jpg', 'Der MilliardÃ¤r Hammond hat sich einen Traum erfüllt und eine Insel gekauft, auf der Dinosaurier dank Klontechnik zu neuem Leben erweckt werden.', 'Der Milliardär Hammond hat sich einen Traum erfüllt und eine Insel gekauft, auf der Dinosaurier dank Klontechnik zu neuem Leben erweckt werden. Er lädt eine Gruppe von Spezialisten zu einer Testbesichtigung des Jurassic Park ein. Zur Sicherheit ist der von einem groÃŸen Elektrozaun umgeben. Doch ein unachtsamer Mitarbeiter legt den Strom lahm und so können die gefährlichen Bestien aus ihren Käfigen ausbrechen. Für die Gäste beginnt ein Überlebenskampf gegen die hungrigen Urzeitmonster.', 16, 'Jeff Goldblum'),
(6, 'Pretty Woman', 1990, 'Garry Marshall', 'https://images-na.ssl-images-amazon.com/images/I/612oWOnZ5LL._SY679_.jpg', 'Die schöne Prostituierte Vivian trifft eines Abends zufällig auf den Geschäftsmann Edward Lewis, der sie nach einer gemeinsamen Nacht im Hotel fragt.', 'Die schöne Prostituierte Vivian trifft eines Abends zufällig auf den GeschÄftsmann Edward Lewis, der sie nach einer gemeinsamen Nacht im Hotel fragt, ob sie ihm für eine Woche als Begleitdame zur Verfügung stehen könnte. Vivian willigt ein und wird mit Hilfe des Hoteldirektors Mr. Thompson in eine Dame verwandelt. Beide spüren, dass sich zwischen ihnen mehr als nur eine Geschäftsbeziehung angebahnt hat.', 12, 'Julia Roberts'),
(7, 'Ziemlich beste Freunde', 2011, 'Olivier Nakache', 'https://blob.cede.ch/catalog/10295000/10295258_1_92.jpg?v=1', 'Philippe ist zwar reich und intelligent, aber er benötigt im Alltag Hilfe, da er vom Hals abwärts gelähmt ist.', 'Philippe ist zwar reich und intelligent, aber er benötigt im Alltag Hilfe, da er vom Hals abwärts gelähmt ist. Als er einen neuen Pfleger engagiert, entscheidet er sich zum Entsetzen seiner Freunde und Vertrauten für den jungen schwarzen Driss, der gerade aus dem Gefängnis entlassen wurde. Der direkte und fröhliche Charakter von Driss beeindruckt Philippe, der besonders unter dem Mitleid seiner Umgebung leidet. Zwischen den beiden entwickelt sich eine ungewöhnliche Männerfreundschaft.', 12, 'Omar Sy'),
(8, 'Forest Gump', 1994, 'Robert Zemecksi', 'https://de.web.img3.acsta.net/pictures/bzp/01/10568.jpg', 'Der gutmütige, leicht gehbehinderte und mit einem IQ von nur 75 ausgestattete Forrest Gump schlägt sich auf bemerkenswerte Weise durch 40 Jahre amerikanische Geschichte. ', 'Der gutmütige, leicht gehbehinderte und mit einem IQ von nur 75 ausgestattete Forrest Gump schlägt sich auf bemerkenswerte Weise durch 40 Jahre amerikanische Geschichte. Er macht Karriere als Football-Spieler, Langstreckenläufer, dekorierter Vietnam-Held und Tischtennis-Profi. Als Unternehmer wird er zum Millionär. Ganz nebenbei erfindet er Elvis Presleys berühmten Hüftschwung und deckt, ohne es zu wissen, den Watergate-Skandal auf. Doch all die Zeit denkt er an seine grosse Liebe Jenny.', 12, 'Tom Hanks'),
(9, 'Hacksaw Ridge', 2016, 'Mel Gibson', 'https://images-na.ssl-images-amazon.com/images/I/91iJXJxmxJL._SL1500_.jpg', 'Während des Zweiten Weltkriegs meldet sich der Medizinstudent Desmond Doss freiwillig zum Dienst in der US-Armee, doch er weigert sich, eine Waffe zu tragen. ', 'Während des Zweiten Weltkriegs meldet sich der Medizinstudent Desmond Doss freiwillig zum Dienst in der US-Armee, doch er weigert sich, eine Waffe zu tragen. ', 16, 'Andrew Garfield'),
(10, 'Die fabelhafte Welt der Amélie', 2001, 'Jean-Pierre Jeunet', 'https://images-na.ssl-images-amazon.com/images/I/71dukueI7CL.jpg', 'Die junge Kellnerin Amélie arbeitet in einem Cafe in Montmartre und hat dort alle Hände voll zu tun. Liebevoll kümmert sie sich um ihre manchmal schrägen Gäste und hypochondrischen Arbeitskollegen.', 'Die junge Kellnerin Amélie arbeitet in einem Cafe in Montmartre und hat dort alle Hände voll zu tun. Liebevoll kümmert sie sich um ihre manchmal schrägen Gäste und hypochondrischen Arbeitskollegen. Dabei verliert sich die Träumerin gelegentlich in ihrer eigenen Welt. Dann aber verliebt sie sich in den verrückten Sammler Nino und weiss nicht, wie sie auf sich aufmerksam machen soll. Nun ist es Amélie, die Hilfe braucht.', 12, 'Audrey Tautou');



INSERT INTO `moviegenre` (`movieGenre_pk`, `movie_fk`, `genre_fk`) VALUES
(1, 2, 3),
(2, 2, 7),
(3, 2, 9),
(4, 3, 3),
(5, 3, 5),
(6, 3, 8),
(7, 4, 3),
(8, 4, 6),
(9, 5, 1),
(10, 5, 6),
(11, 5, 2),
(12, 5, 8),
(13, 6, 1),
(14, 6, 3),
(15, 7, 3),
(16, 7, 5),
(17, 8, 1),
(18, 8, 3),
(19, 8, 5),
(20, 9, 1),
(21, 9, 3),
(22, 9, 8),
(23, 10, 1),
(24, 10, 3),
(25, 10, 9);

