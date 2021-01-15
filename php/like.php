<?php
    // Session anbindung + datenbankverbindung
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    error_reporting(0);
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $movie_pk = mysqli_real_escape_string($con, $_GET['movie_pk']);
    $email = mysqli_real_escape_string($con, $_SESSION['email']);

    // auslesen des users
    $sql = "SELECT user_pk FROM movieuser WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $user_pk = $row['user_pk'];

    // auslesen des ratings mit user und movie
    $sql = "SELECT * FROM hasranked WHERE user_fk = ? AND movie_fk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $user_pk, $movie_pk);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $rows = $result->num_rows;
    

    // prüfen ob schonmal geliket wurde
    if($rows == 0){
        $sql = "INSERT INTO hasranked (user_fk, movie_fk, userLike, userDislike) VALUES (?, ?, 1, 0)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ii", $user_pk, $movie_pk);
        $stmt->execute();
        $result = $stmt->get_result();
        header("Location: index.php");
    }else{
        if($data['userLike'] == 1){
            $sql = "UPDATE hasranked SET userLike = 0, userDislike = 0 WHERE user_fk = ? AND movie_fk = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ii", $user_pk, $movie_pk);
            $stmt->execute();
            $result = $stmt->get_result();
            header("Location: index.php");
        }else{
            $sql = "UPDATE hasranked SET userLike = 1, userDislike = 0 WHERE user_fk = ? AND movie_fk = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ii", $user_pk, $movie_pk);
            $stmt->execute();
            $result = $stmt->get_result();
            header("Location: index.php");
        }
    }
?>