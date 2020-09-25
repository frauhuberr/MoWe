<?php
    // Session anbindung + datenbankverbindung
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $movie_pk = mysqli_real_escape_string($con, $_GET['movie_pk']);
    $email = mysqli_real_escape_string($con, $_SESSION['email']);

    // auslesen des users
    $sql = "SELECT user_pk FROM movieuser WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $user_pk = $row['user_pk'];

    // auslesen des ratings mit user und movie
    $sql = "SELECT * FROM hasranked WHERE user_fk = $user_pk AND movie_fk = $movie_pk";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
    $rows = mysqli_num_rows($result);

    // prüfen ob schonmal gedisliket wurde
    if($rows == 0){
        $sql = "INSERT INTO hasranked (user_fk, movie_fk, userLike, userDislike) VALUES ($user_pk, $movie_pk, 0, 1)";
        mysqli_query($con, $sql);
        header("Location: index.php");
    }else{
        if($data['userDislike'] == 1){
            $sql = "UPDATE hasranked SET userLike = 0, userDislike = 0 WHERE user_fk = $user_pk AND movie_fk = $movie_pk";
            mysqli_query($con, $sql);
            header("Location: index.php");
        }else{
            $sql = "UPDATE hasranked SET userLike = 0, userDislike = 1 WHERE user_fk = $user_pk AND movie_fk = $movie_pk";
            mysqli_query($con, $sql);
            header("Location: index.php");
        }
    }
?>