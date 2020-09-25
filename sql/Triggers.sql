USE movielibrary;
DELIMITER $$

CREATE
     TRIGGER before_update_user BEFORE UPDATE ON movieUser FOR EACH ROW
BEGIN
    INSERT INTO userLOG
    SET 
    user_pk = OLD.user_pk,
    firsName = OLD.firstName,
    lastName = OLD.lastName,
    email = OLD.email,
    password = OLD.password,
    rank_fk = OLD.rank_fk,
    date = NOW(),
    action = 'update';
END$$

DELIMITER ;

DELIMITER $$

CREATE
     TRIGGER before_delete_user BEFORE DELETE ON movieUser FOR EACH ROW
BEGIN
    INSERT INTO userLOG
    SET 
    user_pk = OLD.user_pk,
    firsName = OLD.firstName,
    lastName = OLD.lastName,
    email = OLD.email,
    password = OLD.password,
    rank_fk = OLD.rank_fk,
    date = NOW(),
    action = 'delete';
END$$

DELIMITER ;

DELIMITER $$

CREATE
     TRIGGER before_delete_movie BEFORE DELETE ON movie FOR EACH ROW
BEGIN
    INSERT INTO movieLOG
    SET 
    movie_pk = OLD.movie_pk,
    name = OLD.name,
    yearpublished = OLD.yearpublished,
    producer = OLD.producer,
    imageURL = OLD.imageURL,
    description = OLD.description,
    fsk = OLD.fsk,
    mainActor = OLD.mainActor,
    date = NOW(),
    action = 'delete';
END$$

DELIMITER ;