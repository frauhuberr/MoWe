<?php
    // Session anbindung + Datenbankverbindung
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    error_reporting(0);
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
    $sql = "SELECT * FROM movieuser WHERE (firstName = ? AND lastName = ?) OR email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0){
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
            $rank_ID = 1;
            $sql = "INSERT INTO movieuser (firstName, lastName, password, email, rank_fk) VALUES (?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssi", $firstname, $lastname, $hashPassword, $email, $rank_ID);
            $stmt->execute();
            $result = $stmt->get_result();
            if(!$result){
                $_SESSION['user'] = true;
                $_SESSION['email'] = $email;
                header("Location: index.php");
            }
            else{
                echo 'fail '.$sql.'<br>'.mysqli_error($con);
            }   
        }
    }else{
        header("Location: formular_register.php?registration=1");
    }
?>