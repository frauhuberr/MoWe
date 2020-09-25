<?php
    // Session anbindung + Datenbankverbindung
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db ($con,'movielibrary')){
        die ("Keine Verbindung zur Datenbank");
    } 
    
    // Variablen erstellen
    $password = mysqli_real_escape_string($con, $_POST['pwd']);
    $password_2 = mysqli_real_escape_string($con, $_POST['pwd_new']);
    $email = $_SESSION['email'];

    // Prüfen ob Passwörter übereinstimmen und Tabelle updaten
    if($password != "" AND $password_2 != "" AND $password == $password_2){
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE movieuser SET password = '$hashPassword' WHERE email = '$email'";
        mysqli_query($con, $sql);
        header("Location: user_detail.php");
    }else{
        header("Location: formular_change_password.php?error=1");
    }
?>  