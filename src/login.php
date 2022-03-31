<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap 5.0 Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Google Fonts (Mulish) -->
  <link href="https://fonts.googleapis.com/css2?family=Mulish&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
  <?php require './navbar.php'?>
  <div class="login-page">
    <div class="wrapper">
      <div class="title">Login</div>
      <?php
if (isset($_GET["notification"])) {
    echo "<div class='alert alert-success' role='alert'>" . $_GET["notification"] . "</div>";
}
?>
      <form action="login.inc.php" method="post">
        <div class="field">
          <input type="text" name="email" required>
          <label>Email Address</label>
        </div>
        <div class="field">
          <input type="password" name="pwd" required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
        </div>
        <div class="field">
          <input type="submit" name="submit" value="Login Now">
        </div>
        <div class="signup-link">Not a member? <a href="/signup">Signup now</a></div>
      </form>
      <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!<p>";
    } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information!<p>";
    }
}
?>
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
