<?php
    // Zerstören der Session, der user wird ausgeloggt
    ob_start ();
    session_set_cookie_params(600,null,null,false,true);
    session_start ();
    error_reporting(0);
    session_unset ();
    session_destroy ();
    header('X-Content-Type-Options: nosniff');
    header ("Location: index.php");
    ob_end_flush ();
?> 