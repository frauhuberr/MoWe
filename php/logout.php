<?php
    // Zerstören der Session, der user wird ausgeloggt
    ob_start ();
    session_start ();
    session_unset ();
    session_destroy ();
    header ("Location: index.php");
    ob_end_flush ();
?> 