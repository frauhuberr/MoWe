<?php
    // Session anbindung + Datenbankverbindung
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variable deklarieren
    $email = mysqli_real_escape_string($con, $_SESSION['email']);

    // Asuslesen des users
    $sql = "SELECT user_pk FROM movieuser WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_array($result);
    $user_pk = $data['user_pk'];

    // löschen der Bewertungen des users sonst kann man user nicht löschen
    $sql = "DELETE FROM hasranked WHERE user_fk = $user_pk";
    mysqli_query($con, $sql);

    // löschen des users
    $sql = "DELETE FROM movieuser WHERE user_pk = $user_pk";
    mysqli_query($con, $sql);
    session_destroy();
    header("Location: index.php");
?>