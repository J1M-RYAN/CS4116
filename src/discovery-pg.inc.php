<?php
    session_start();
    include "init.php";
    //Importing php files to access functions from those files
    require_once 'functions.inc.php';
    if(isset($_POST["like-button"])){

        $temp = new Database();
        $conn = $temp->instance();

        $user_id = $_SESSION["userid"];;
        $connection_id = $_POST['connectionId'];

        createConnection($conn, $user_id, $connection_id);
    } else{
        header("location: discovery-pg.php");
        exit();
    }
?>