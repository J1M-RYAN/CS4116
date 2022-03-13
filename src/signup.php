<!DOCTYPE html>
<html lang="en">

<head>
<?php
include_once "init.php";
?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5.0 Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Google Fonts (Mulish) -->
  <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">

  <!-- Main Css File -->
  <link rel="stylesheet" href="main.css">


</head>

<body>
<?php require './navbar.php'?>

  <div class="signup-page">

    <div class="wrapper-box">
      <h2>Registration</h2>
      <div>
        
      </div>
      <form action="#">
        <div class="input-box">
          <input type="text" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <input type="text" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Create password" required>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Confirm password" required>
        </div>
        <div class="policy">
          <input type="checkbox">
          <h3>I accept all terms & condition</h3>
        </div>
        <div class="input-box button">
          <input type="Submit" value="Register Now">
        </div>
        <div class="text">
          <h3>Already have an account? <a href="#">Login now</a></h3>
        </div>
      </form>
    </div>
  </div>
<!-- Footer  -->
  <?php require './footer.php'?>

  <!-- Bootstrap 5.0 JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>