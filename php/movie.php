<?php
    // Session anbindung + Datenbankverbindung
    session_start();
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
    $sql = "SELECT * FROM movie WHERE (name = '$movieName')";
    $result = mysqli_query($con, $sql);
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
            header("Location: add_movie.php?fehler=1");
        } else {
            // Werte in die Datenbank füllen
            try {
                $insertMovie = "INSERT INTO movie (name, yearpublished, producer, imageURL, description, fsk, mainActor, description_short) VALUES ('$movieName', '$year', '$producer', '$imageUrl', '$description', '$age','$actor', '$description_short')";
                mysqli_query($con, $insertMovie);
                $getMovie = "SELECT * FROM movie WHERE name = '$movieName'";
                $res = mysqli_query($con, $getMovie);
                $data = mysqli_fetch_assoc($res);
                $movie_pk = $data['movie_pk'];

                foreach ($genre as $g) {
                    $getGenre = "SELECT genre_pk FROM genre WHERE name = '$g'";
                    $showGenre = mysqli_query($con, $getGenre);
                    $data = mysqli_fetch_assoc($showGenre);
                    $genre_pk = $data['genre_pk'];

                    $sql = "INSERT INTO movieGenre(movie_fk, genre_fk) VALUES($movie_pk, $genre_pk)";
                    mysqli_query($con, $sql);
                }
                header("Location: index.php");
            } catch (Exception $e) {
                echo 'fail' . $sql . '<br>' . mysqli_error($con);
                header("Location: add_movie.php?fail=1");
            }
        }
    } else {
        header("Location: add_movie.php?exists=1");
    }
?>