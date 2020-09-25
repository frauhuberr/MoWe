<?php
    // Session anbindung + Datenbankverbindung
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db ($con,'movielibrary')){
        die ("Keine Verbindung zur Datenbank");
    } 
    
    // Variablen erstellen
    $firstname = mysqli_real_escape_string($con, $_POST['vorname']);
    $lastname = mysqli_real_escape_string($con, $_POST['nachname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['pwd']);

    // Prüfen ob der User bereits registriert ist
    $sql = "SELECT * FROM movieuser WHERE (firstName = '$firstname' AND lastName = '$lastname') OR email = '$email'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == 0){
        // Prüfen ob Formular korrekt ausgefüllt wurde
        $error = false;
        if($firstname == ""){
            $error = true;
        }
    
        if($lastname == ""){
            $error = true;
        }
    
        if($email == ""){
            $error = true;
        }
    
        if($password == ""){
            $error = true;
        }
    
        if($error == true){
            header("Location: formular_register.php?fehler=1");
        }else{
            // User in Datenbank generieren
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO movieuser (firstName, lastName, password, email, rank_fk) VALUES ('$firstname', '$lastname', '$hashPassword', '$email', 1)";
            $result = mysqli_query($con, $sql);
            if($result){
                $_SESSION['user'] = true;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
            else{
                echo 'fail'.$sql.'<br>'.mysqli_error($con);
            }   
        }
    }else{
        header("Location: formular_register.php?registration=1");
    }
?>