<?php
if (isset($_GET["error"]) && $_GET["error"] == "none") {
    header("Location: /login?notification=" . urlencode("You have successfully signed up! Please log in."));
    exit();
}
?>
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
  <link rel="stylesheet" href="./assets/css/main.css">

  <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <title>Registration</title>

</head>

<body>
<?php require './navbar.php'?>

  <div class="signup-page">

    <div class="wrapper-box">
      <h2>Registration</h2>
      <form action="signup.inc.php" method="post">
        <div class="input-box">
          <input type="text" name="Firstname" placeholder="First name" required>
        </div>
        <div class="input-box">
          <input type="text" name="Surname" placeholder="Surname" required>
        </div>
        <div class="input-box">
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <input type="password" name="pwd" placeholder="Create password" required>
        </div>
        <div class="input-box">
          <input type="password" name="pwdrepeat" placeholder="Confirm password" required>
        </div>
        <div class="policy">
          <input type="checkbox">
          <h3>I accept all terms & conditions</h3>
        </div>
        <div class="input-box button">
          <input type="Submit" name="submit" value="Register Now">
        </div>
        <div class="text">
          <h3>Already have an account? <a href="/login">Login now</a></h3>
        </div>
        <div>
          <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!<p>";
    } else if ($_GET["error"] == "invalidfirstname") {
        echo "<p>Choose a proper firstname!<p>";
    } else if ($_GET["error"] == "invalidsurname") {
        echo "<p>Choose a proper surname!<p>";
    } else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper email!<p>";
    } else if ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords don't match!<p>";
    } else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong try again!<p>";
    } else if ($_GET["error"] == "emailtaken") {
        echo "<p>Email is already taken!<p>";
    } else if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!<p>";
    }
}
?>
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