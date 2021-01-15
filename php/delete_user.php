<?php
    // Session anbindung + Datenbankverbindung
    error_reporting(0);
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variable deklarieren
    $email = mysqli_real_escape_string($con, $_SESSION['email']);

    // Asuslesen des users
    $sql = "SELECT user_pk FROM movieuser WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $user_pk = $data['user_pk'];

    // löschen der Bewertungen des users sonst kann man user nicht löschen
    $sql = "DELETE FROM hasranked WHERE user_fk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_pk);
    $stmt->execute();

    // löschen des users
    $sql = "DELETE FROM movieuser WHERE user_pk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_pk);
    $stmt->execute();
    session_destroy();
    header('X-Content-Type-Options: nosniff');
    header("Location: index.php");
?>