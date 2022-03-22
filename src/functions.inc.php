<?php
    
    //EMPTY INPUT FIELD
    
    function emptyInputSignup($firstName, $surName, $email, $pwd, $pwdRepeat) {
       $result = false; 
       if(empty($firstName) || empty($surName) || empty($email)  || empty($pwd) || empty($pwdRepeat)){
            $result = true;
       } 
       return $result;
    }
    
    //INVALID FIRSTNAME

    function invalidFirstName($firstName) {
        $result = false; 
        if(!preg_match("/^[a-zA-Z]*$/", $firstName)){
             $result = true;
        } 
        return $result;
    }

    //INVALID SURNAME

    function invalidSurName($surName) {
        $result = false; 
        if(!preg_match("/^[a-zA-Z]*$/", $surName)){
             $result = true;
        } 
        return $result;
    }

    //INVALID EMAIL

    function invalidEmail($email) {
        $result = false; 
        //filter_var - php function - Validates email variable
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $result = true;
        } 
        return $result;
    }
    
    //REPEAT PASSWORD CHECK

    function pwdMatch($pwd, $pwdRepeat) {
        $result = false; 
        if($pwd !== $pwdRepeat){
             $result = true;
        } 
        return $result;
    }

    //EMAIL EXISTS

    function emailExists($conn, $email) {
       
       $sql = "SELECT * FROM User WHERE Email = ?;";

       $stmt = mysqli_stmt_init($conn); 
       
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("location: signup.php?error=stmtfailed");
           exit();
       }

       mysqli_stmt_bind_param($stmt, "s", $email);
       mysqli_stmt_execute($stmt);

       $resultData = mysqli_stmt_get_result($stmt);

       if($row = mysqli_fetch_assoc($resultData)){ 
            return $row;
       } else{
           $result = false;
           return $result;
       }

       mysqli_stmt_close($stmt); 
    }
    
    function createUser($conn, $firstName, $surName, $email, $pwd) {
            
        $userType = 1; 
        $sql = "INSERT INTO User (Email, Firstname, Surname, Password, UserType) VALUES (?, ?, ?, ?, ?);";
    
        $stmt = mysqli_stmt_init($conn); 
           
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: signup.php?error=stmtfailed");
            exit();
        }
           
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $email, $firstName, $surName, $hashedPwd,  $userType);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt); 
        header("location: signup.php?error=none");
        exit();
    }

    function emptyInputLogin($email, $pwd){
        $result = false;
        if(empty($email) || empty($pwd)){
            $result = true;
        }
        return $result;
    }

    function loginUser($conn, $email, $pwd){
        $emailExists = emailExists($conn, $email);
        if($emailExists == false){
          header("location: login.php?error=wronglogin");
          exit();  
        }

        $pwdHashed = $emailExists["Password"]; //Associatate array (Keys) - Use column name in DB

        $checkPwd = password_verify($pwd, $pwdHashed); 

        if($checkPwd ==  false){ 
            header("location: login.php?error=wronglogin");
            exit();
        }
        else if($checkPwd == true){
            session_start();
            $_SESSION["userEmail"] = $emailExists["Email"];
            $_SESSION["userid"] = $emailExists["UserID"];
            header("location: index.php");
            exit();
        }

    }