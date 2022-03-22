<?php 
    //Destroy session variables in current session
    session_start();
    session_unset();
    session_destroy();
    header("location: index.php");
    exit();
?>