<?php 
    include "init.php";
    //Importing php files to access functions from those files
    require_once 'functions.inc.php';
    if(isset($_POST["submit"])){

        $temp = new Database();
        $conn = $temp->instance();
       
        $age = $_POST['age'];
        $height = $_POST['height'];
        $starsign = $_POST['starsign'];
        $religion = $_POST['religion'];
        $loaction = $_POST['loaction'];
        $intrests = $_POST['intrests'];
        $description = $_POST['description'];
        $gender = $_POST['gender'];
        $smoker = $_POST['smoker'];
        $seeking = $_POST['seeking'];

        //Error handling - data input correctly
       
        //EMPTY INPUT FIELD  

        if(emptyInputSignup($age, $height, $starsign, $religion, $loaction, $intrests ,$description, $gender, $smoker ,$seeking) !== false){
            header("location: create-profile-pg.php?error=emptyinput"); 
            exit();
        }

        //INVALID AGE

        if(invalidAge($firstName) !== false){
            header("location: create-profile-pg.php?error=invalidage"); 
            exit();
        }

        //INVALID SURNAME

        if(invalidHeight($height) !== false){
            header("location: create-profile-pg.php?error=invalidheight"); 
            exit();
        }
    } else{
        header("location: create-profile-pg.php");
        exit();
    }
?>