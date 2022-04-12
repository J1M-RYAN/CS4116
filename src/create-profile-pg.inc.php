<?php
    session_start();
    include "init.php";
    //Importing php files to access functions from those files
    require_once 'functions.inc.php';
    if(isset($_POST["submit"])){

        $temp = new Database();
        $conn = $temp->instance();
       
        $userId = $_SESSION["userid"];
        $age = $_POST['age'];
        $height = $_POST['height'];
        $starsign = $_POST['starsign'];
        $religion = $_POST['religion'];
        $locationID = $_POST['county'];
        $interests = $_POST['interests'];
        $description = $_POST['description'];
        $gender = $_POST['gender'];
        $smoking = $_POST['smoking'];
        $seeking = $_POST['seeking'];
        $drinking = $_POST['drinking'];
        $childrens = $_POST['childrens'];
        $banned = 0;
        $photo = $_POST['photo'];

        //Error handling - data input correctly
       
        //EMPTY INPUT FIELD  

        if(emptyInputSignup($age, $height, $starsign, $religion, $locationID, $interests ,$description, $gender, $smoking ,$seeking) !== false){
            header("location: create-profile-pg.php?error=emptyinput"); 
            exit();
        }

        //INVALID AGE

        if(invalidAge($age) !== false){
            header("location: create-profile-pg.php?error=invalidage"); 
            exit();
        }

        //INVALID HEIGHT

        if(validHeight($height) !== false){
            header("location: create-profile-pg.php?error=invalidheight"); 
            exit();
        }
        
        createProfile($conn, $userId, $age, $height, $starsign, $smoking, $drinking, $gender, $seeking, $religion, $childrens, $description, $banned, $photo ,$locationID);

    } else{
        header("location: create-profile-pg.php");
        exit();
    }
?>