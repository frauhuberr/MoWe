<?php 
    // Session Anbindung + Datenbankverbindung
    error_reporting(0);
    session_set_cookie_params(600,null,null,false,true);
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $moviePK = $_REQUEST['pk'];

    // Fremdschlüssel löschen
    $sql = "DELETE FROM hasranked WHERE movie_fk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $moviePK);
    $stmt->execute();

    $sql = "DELETE FROM moviegenre WHERE movie_fk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $moviePK);
    $stmt->execute();

    // Film löschen
    $sql = "DELETE FROM movie WHERE movie_pk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $moviePK);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if(!$result){
        header("Location: index.php");
    }else{
        echo 'fail'.$sql.'<br>'.mysqli_error($con);
    }
?>