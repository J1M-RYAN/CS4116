<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

  <title>page_404</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-font-smoothing: antialiased;
      -moz-font-smoothing: antialiased;
      -o-font-smoothing: antialiased;
      font-smoothing: antialiased;
      text-rendering: optimizeLegibility;
    }

    body {
      font-weight: 100;
      font-size: 12px;
      line-height: 30px;
      background-image: url(bg-pg.png);
      background-repeat: no-repeat;
      background-size: cover;

    }

    .container {
      max-width: 600px;
      width: 100%;
      margin: 0 auto;
      position: relative;
    }

    #contact input[type="text"],
    #contact input[type="email"],
    #contact input[type="url"],
    #contact textarea,
    #contact button[type="submit"] {
      font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
    }

    #contact {
      background: #f9f9f994;
      padding: 25px;
      margin: 150px 0;
      border-radius: 10px;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    #contact h2 {
      display: block;
      font-size: 30px;
      font-weight: 300;
      margin-bottom: 10px;
      text-align: center;
    }

    #contact h4 {
      margin: 5px 0 15px;
      display: block;
      font-size: 13px;
      font-weight: 400;
      text-align: center;
    }

    fieldset {
      border: medium none !important;
      margin: 0 0 10px;
      min-width: 100%;
      padding: 0;
      width: 100%;
    }

    #contact input[type="text"],
    #contact input[type="email"],
    #contact input[type="url"],
    #contact textarea {
      width: 100%;
      border: 1px solid #ccc;
      background: #FFF;
      margin: 0 0 5px;
      padding: 10px;
    }

    #contact input[type="text"]:hover,
    #contact input[type="email"]:hover,
    #contact input[type="url"]:hover,
    #contact textarea:hover {
      -webkit-transition: border-color 0.3s ease-in-out;
      -moz-transition: border-color 0.3s ease-in-out;
      transition: border-color 0.3s ease-in-out;
      border: 1px solid #aaa;
    }

    #contact textarea {
      height: 100px;
      max-width: 100%;
      resize: none;
    }

    #contact button[type="submit"] {
      cursor: pointer;
      width: 100%;
      border: none;
      background: #dd314e;
      color: #FFF;
      margin: 0 0 5px;
      padding: 10px;
      font-size: 15px;
    }

    #contact button[type="submit"]:hover {
      background: #391866;
      -webkit-transition: background 0.3s ease-in-out;
      -moz-transition: background 0.3s ease-in-out;
      transition: background-color 0.3s ease-in-out;
    }

    #contact button[type="submit"]:active {
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }

    /* #contact input:focus,
    #contact textarea:focus {
      outline: 0;
      border: 1px solid #aaa;
    }

    ::-webkit-input-placeholder {
      color: #888;
    }

    :-moz-placeholder {
      color: #888;
    }

    ::-moz-placeholder {
      color: #888;
    }

    :-ms-input-placeholder {
      color: #888;
    } */
  </style>
</head>

<body>
  <div class="container">
    <form id="contact" action="" method="post">
      <h2>Contact Form</h2>
      <h4>Contact us if you have any issue</h4>
      <fieldset>
        <input placeholder="Your name" type="text" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input placeholder="Your Email Address" type="email" tabindex="2" required>
      </fieldset>
      <fieldset>
        <input placeholder="Your Account username " type="text" tabindex="3" required>
      </fieldset>

      <fieldset>
        <textarea placeholder="Type your querry here...." tabindex="5" required></textarea>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>

    </form>
  </div>
</body>

</html>
