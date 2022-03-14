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
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Fav icon -->
    <link rel="shortcut icon" href="./assets/images/Logo.png" type="image/x-icon">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Love Spark - It All Starts With A Date</title>
</head>

<body>

   <?php include "./navbar.php"?>

    <!-- Hero -->
    <div class="container-fluid bg-main py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-auto">
                    <p class="h1 fw-bold text-white">
                        New People
                        <span class="text-red">And</span>
                        Unforgettable
                        <span class="text-red">Dating</span>
                    </p>
                    <p class="h4 text-white my-5">
                        Still looking for your significant other? Love Spark is the place for you!
                        Join us now to meet single men and Women.
                    </p>
                    <div class="row">
                        <div class="col-md-6 my-2">
                        <a href="./signup"><button class="btn btn-red btn-lg w-100 py-3 move-icon">
                                Get Started Now <i class="fa fa-chevron-right"></i>
                            </button>
                        </a>
                        </div>
                        <div class="col-md-6 my-2">
                            <a href="/about">
                            <button class="btn btn-white btn-lg w-100 py-3 move-icon">
                                Learn More <i class="fa fa-chevron-down"></i>
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="./assets/images/main image.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- / Hero -->


    <!-- Data Section -->
    <div class="container-fluid bg-about py-5">
        <div class="container py-5">
            <p class="text-center h4 text-white fw-bold">About Our Love Spark</p>
            <p class="text-center h1 text-white fw-bold">It All Starts With A Date</p>

            <div class="row py-5">
                <div class="col-md-3">
                    <div class="feature bg-main p-3 py-5">
                        <div class="text-center">
                            <img src="./assets/images/01.png" class="img-fluid">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="w-50 py-1 bg-danger"></div>
                        </div>
                        <p class="text-center h1 fw-bold text-white mt-4">29,991</p>
                        <p class="text-center h6 text-white fw-bold">Members in Total</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature bg-main p-3 py-5">
                        <div class="text-center">
                            <img src="./assets/images/02.png" class="img-fluid">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="w-50 py-1 bg-danger"></div>
                        </div>
                        <p class="text-center h1 fw-bold text-white mt-4">29,991</p>
                        <p class="text-center h6 text-white fw-bold">Members Online</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature bg-main p-3 py-5">
                        <div class="text-center">
                            <img src="./assets/images/03.png" class="img-fluid">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="w-50 py-1 bg-danger"></div>
                        </div>
                        <p class="text-center h1 fw-bold text-white mt-4"><?php
$temp = new User();
echo $temp->getNumberMales();
?></p>
                        <p class="text-center h6 text-white fw-bold">Men Online</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature bg-main p-3 py-5">
                        <div class="text-center">
                            <img src="./assets/images/04.png" class="img-fluid">
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <div class="w-50 py-1 bg-danger"></div>
                        </div>
                        <p class="text-center h1 fw-bold text-white mt-4"><?php
$temp = new User();
echo $temp->getNumberFemales();
?></p>
                        <p class="text-center h6 text-white fw-bold">Women Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Data Section -->
    <!-- How Does It Work -->
    <div class="container-fluid py-5 bg-how-does-it-work bg-main">
        <div class="container py-5">
            <p class="text-red text-center fw-bold h4">How Does It Work?</p>
            <p class="text-white text-center fw-bold h1">You're Just 3 Steps Away From A Great Date</p>
            <div class="row mt-5 justify-content-center">
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="./assets/images/01m.png" class="img-fluid">
                    </div>
                    <p class="my-3 text-center text-white h3 fw-bold">Create A Profile</p>
                </div>
                <div class="col-md-1 my-auto">
                    <img src="./assets/images/arrow-right.png" class="img-fluid">
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="./assets/images/02m.png" class="img-fluid">
                    </div>
                    <p class="my-3 text-center text-white h3 fw-bold">Find Matches</p>
                </div>
                <div class="col-md-1 my-auto">
                    <img src="./assets/images/arrow-right.png" class="img-fluid">
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <img src="./assets/images/03m.png" class="img-fluid">
                    </div>
                    <p class="my-3 text-center text-white h3 fw-bold">Start Dating</p>
                </div>
            </div>
        </div>
    </div>
   <?php include "./footer.php"?>
    <!-- Bootstrap 5.0 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>
