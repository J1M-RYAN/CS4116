<?php 
    include "init.php";
    require_once 'functions.inc.php';
    if(isset($_POST["submit"])){

        $temp = new Database();
        $conn = $temp->instance();
       
        $firstName = $_POST['Firstname'];
        $surName = $_POST['Surname'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $pwdRepeat = $_POST['pwdrepeat'];

        //Error handling - Signed in correctly
        //Importing php files to access functions from those files
       
        //EMPTY INPUT FIELD  

        if(emptyInputSignup($firstName, $surName, $email, $pwd, $pwdRepeat) !== false){
            header("location: signup.php?error=emptyinput"); 
            exit();
        }

        //INVALID FIRSTNAME

        if(invalidFirstName($firstName) !== false){
            header("location: signup.php?error=invalidfirstname"); 
            exit();
        }

        //INVALID SURNAME

        if(invalidFirstName($surName) !== false){
            header("location: signup.php?error=invalidsurname"); 
            exit();
        }

        //INVALID EMAIL

        if(invalidEmail($email) !== false){
            header("location: signup.php?error=invalidemail"); 
            exit();
        }

        //SAME REPEAT PASSWORD 

        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: signup.php?error=passwordsdontmatch"); 
            exit();
        }

        //EMAIL TAKEN
    
        if(emailExists($conn, $email) !== false){
            header("location: signup.php?error=emailtaken"); 
            exit();
        }

        //Sign up user to website
        createUser($conn, $firstName, $surName, $email, $pwd);

    } else{
        header("location: signup.php");
        exit();
    }
?>