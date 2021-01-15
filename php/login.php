<?php
    // session anbindung + Datenbankverbindung
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    error_reporting(0);
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);

    // User auslesen, mit der E-Mail welche angegeben wurde
    $sql = "SELECT * FROM movieuser WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Prüfen ob User existiert
    if ($result->num_rows < 1) {
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