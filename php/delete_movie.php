<?php 
    // Session Anbindung + Datenbankverbindung 
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'movielibrary');
    if (!mysqli_select_db($con, 'movielibrary')) {
        die("Keine Verbindung zur Datenbank");
    }

    // Variablen erstellen
    $moviePK = $_REQUEST['pk'];

    // Fremdschlüssel löschen
    $sql = "DELETE FROM hasranked WHERE movie_fk = $moviePK";
    mysqli_query($con, $sql);

    $sql = "DELETE FROM moviegenre WHERE movie_fk = $moviePK";
    mysqli_query($con, $sql);

    // Film löschen
    $sql = "DELETE FROM movie WHERE movie_pk = $moviePK";

    $result = mysqli_query($con,$sql);
    if($result){
        header("Location: index.php");
    }
    else{
        echo 'fail'.$sql.'<br>'.mysqli_error($con);
    }
?>