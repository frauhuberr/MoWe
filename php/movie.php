<?php
    // Session anbindung + Datenbankverbindung
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    error_reporting(0);
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $movieName = mysqli_real_escape_string($con, $_POST['movieName']);
    $year = mysqli_real_escape_string($con, $_POST['year']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $producer = mysqli_real_escape_string($con, $_POST['producer']);
    $actor = mysqli_real_escape_string($con, $_POST['actor']);
    $imageUrl = mysqli_real_escape_string($con, $_POST['imageUrl']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $description_short = mysqli_real_escape_string($con, $_POST['description_short']);
    $genre = $_POST['genre'];
    $g = "";

    //Prüfen ob Film bereits existiert
    $sql = "SELECT * FROM movie WHERE (name = ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $movieName);
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) == 0) {

        //Formular prüfen
        $error = false;
        if ($movieName == "") {
            $error = true;
        }

        if ($year == "") {
            $error = true;
        }

        if ($age == "") {
            $error = true;
        }

        if ($producer == "") {
            $error = true;
        }

        if ($actor == "") {
            $error = true;
        }

        if ($imageUrl == "") {
            $error = true;
        }

        if ($description == "") {
            $error = true;
        }

        if ($description_short == "") {
            $error = true;
        }
        if ($genre == "") {
            $error = true;
        }

        if ($error == true) {
            header('X-Content-Type-Options: nosniff');
            header("Location: add_movie.php?fehler=1");
        } else {
            // Werte in die Datenbank füllen
            try {
                $sql = "INSERT INTO movie (name, yearpublished, producer, imageURL, description, fsk, mainActor, description_short) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("sisssiss", $movieName, $year, $producer, $imageUrl, $description, $age, $actor, $description_short);
                $stmt->execute();
                
                $sql = "SELECT * FROM movie WHERE name = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $movieName);
                $stmt->execute();

                $result = $stmt->get_result();
                $data = $result->fetch_assoc();
                $movie_pk = $data['movie_pk'];

                foreach ($genre as $g) {
                    $sql = "SELECT genre_pk FROM genre WHERE name = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("s", $g);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $data = $result->fetch_assoc();
                    $genre_pk = $data['genre_pk'];

                    $sql = "INSERT INTO movieGenre(movie_fk, genre_fk) VALUES(?, ?)";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("ii", $movie_pk, $genre_pk);
                    $stmt->execute();

                }
                header('X-Content-Type-Options: nosniff');
                header("Location: index.php");
            } catch (Exception $e) {
                echo 'fail' . $sql . '<br>' . mysqli_error($con);
                header('X-Content-Type-Options: nosniff');
                header("Location: add_movie.php?fail=1");
            }
        }
    } else {
        header('X-Content-Type-Options: nosniff');
        header("Location: add_movie.php?exists=1");
    }
?>