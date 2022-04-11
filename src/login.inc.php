<?php 
include "init.php";
require_once 'functions.inc.php';

    if(isset($_POST['submit'])) //Form has been submitted the correct way - user accessed the page the correct way
    {   
        $temp = new Database();
        $conn = $temp->instance();

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        if(emptyInputLogin($email, $pwd) !== false){
            header("location: login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $email, $pwd);
        updateUserLastLogintime($_SESSION["userid"]);
    } else{
        header("location: login.php"); // Redirects user if they did not submit the form to run this php script 
        exit();
    }
?>