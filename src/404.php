<!DOCTYPE html>
<html lang="en">

<head>
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

  <title>page_404</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .page_404 {

            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-image: url(bg-pg.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .four_z_4_bg {
            padding-bottom: 50px;
        }

        .responsive {
            width: 80%;
            height: auto;
            max-width: 600px;
        }

        h1 {
            font-size: 80px;
        }

        .btn{
            height: 100%;
            width: auto;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #dd314e;
        
        }
        .a:hover{
            color: #fff;
        }
        .but :hover{
            background: #695e77;
            
        }
    </style>

</head>

<body>
<?php require './navbar.php'?>
<section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="four_z_4_bg">
                            <img src="./bgg.png" alt="404-image" class="responsive">
                            <h3 class="h2">The page you are looking for is not available</h3>
                        </div>
                        <div class="but">
                            <a href="#" class="btn btn-lg" role="button">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>