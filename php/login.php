<?php
    // session anbindung + Datenbankverbindung
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);

    // User auslesen, mit der E-Mail welche angegeben wurde
    $sql = "SELECT * FROM movieuser WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);

    // Prüfen ob User existiert
    if (mysqli_num_rows($result) < 1) {
        header("Location: formular_login.php?error=1");
    } else {
        // Prüfen des Passwortes
        $hash = $data['password'];
        $verify = password_verify($password, $hash);
        if ($verify === true) {
            if ($data['rank_fk'] == 1) {
                $_SESSION['user'] = true;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }if ($data['rank_fk'] == 2) {
                $_SESSION['user'] = true;
                $_SESSION['admin'] = true;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
            
        } else {
            header("Location: formular_login.php?fehler=1");
        }
    }
?>