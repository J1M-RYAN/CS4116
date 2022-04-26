<?php 
    session_start();
?>
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

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- Main Css File for header and footer-->
  <link rel="stylesheet" href="./assets/css/main.css">

    <!-- Internal style sheet starts here -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {

            height: 200vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-image: url(src/assets/images/bg-pg.png);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            max-width: 80%;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.664);
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            text-align: center;
        }

        @media(max-width: 459px) {
            .container .content {
                flex-direction: column;
            }
        }

        .fw-bold {
            font-weight: bold !important;
        }

        .d-flex {
            display: flex !important;
        }

        .margin-top-2 {
            margin-top: 2rem;
        }

        .col-25 {
            max-width: 25% !important;
            width: 25% !important;
        }

        .col-33 {
            max-width: 33% !important;
            width: 33% !important;
        }

        .col-50 {
            max-width: 50% !important;
            width: 50% !important;
        }

        .col-66 {
            max-width: 66% !important;
            width: 66% !important;
        }

        .col-75 {
            max-width: 75% !important;
            width: 75% !important;
        }

        .col-25 {
            max-width: 25% !important;
            width: 25% !important;
        }

        .content-center {
            justify-content: center !important;
        }

        .profile-box {
            text-align: center;
            padding: 10px;
            border-radius: 3px;
        }

        .profile-img {
            height: 118px;
            border-radius: 50%;
        }

        .text-center {
            text-align: center;
        }

        .scroll-x {
            overflow-x: scroll !important;
        }

        .pr-3 {
            padding-right: 3rem !important;
        }

        .gap-1 {
            gap: 1rem;
        }

        @media screen and (max-width: 768px) {
            .container {
                padding-top: 143px;
            }

            .d-flex.row {
                display: block !important;
            }

            .d-flex.row div {
                width: 100% !important;
                max-width: 100% !important;
            }
        }
    </style>
    <!-- Internal style sheet ends here -->

</head>

<body>
    <div class="container">
        <div class="title">Profile</div>
        <div class="content margin-top-2">
            <div class="d-flex content-center">
                <div class="col-50">
                    <div class="profile-box">
                        <img src="src/assets/images/blank-profile.png" class="profile-img">
                    </div>
                </div>
            </div>
            <div class="d-flex row margin-top-2">
                <div class="col-33">
                    <h5 class="fw-bold">First name: </h5>
                    <?php
include_once "functions.inc.php";
$userId = $_SESSION["userid"];
$list_of_profile_details = getProfileDetails($userId);
$list_of_user_details = getUserDetails($userId);
echo '<p>' . $list_of_user_details[4] . '</p>';
?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Surname: </h5>
                    <?php
                        echo '<p>' . $list_of_user_details[5] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Email: </h5>
                    <?php
                        echo '<p>' . $list_of_user_details[3] . '</p>';
                    ?>
                </div>
            </div>
            <div class="d-flex row margin-top-2">
                <div class="col-33">
                    <h5 class="fw-bold">Religion: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[8] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Gender: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[6] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Age: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[1] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Childrens: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[9] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Seeking: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[7] . '</p>';
                    ?>
                </div>
            </div>
            <div class="d-flex row margin-top-2">
                <div class="col-66">
                    <h5 class="fw-bold">Short Bio: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[10] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Height: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[2] . '</p>';
                    ?>
                </div>
            </div>
            <div class="d-flex row margin-top-2">
                <div class="col-33">
                    <h5 class="fw-bold">Hobbies: </h5>
                    <p>Hobby 1, Hobby 2</p>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">StarSign: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[3] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">County: </h5>
                    <?php
                        $county = getCountyFromLocationID($list_of_profile_details[13]);
                        echo '<p>' . $county[0] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Drinking: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[5] . '</p>';
                    ?>
                </div>
                <div class="col-33">
                    <h5 class="fw-bold">Smoking: </h5>
                    <?php
                        echo '<p>' . $list_of_profile_details[4] . '</p>';
                    ?>
                </div>
            </div>
            <div class="d-flex row">
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <?php
include_once "functions.inc.php";
$list_of_userIds = getConnectionIds();
?>
                <div class="card radius p-4">
                    <?php $totalUsers = count($list_of_userIds);
                    echo '<p class="h2">Friend Requests</p>'; ?>
                    <div class="row">
                        
                    <?php
                    include_once "functions.inc.php";
                    $list_of_connection_ids=array();
                    $connectionIdCount = 0;
                    foreach ($list_of_userIds as $userId) {
                        $profie_data = getProfileDetails($userId);
                        $list_of_user_details = getUserDetails($userId);
                        array_push($list_of_connection_ids, $userId);
                        echo '<div class="col-md-3 mb-3 prof-card">';
                        echo '
                        <form name = "like button" action="discovery-pg.inc.php" method="post">';
                            echo '<div class="bg-light radius border p-3">';
                                echo '<div class="text-center">';
                                    echo '<img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_640.png" class="img-fluid avatar">';
                                echo '</div>';
                                echo '<div class="profile-usertitle">';
                                    echo '<div class="profile-usertitle-name">';
                                        echo $list_of_user_details[4];
                                    echo '</div>';
                                    echo '<div class="profile-usertitle-age">';
                                        echo $profie_data[1];
                                    echo '</div>';
                                    echo '<div class="profile-usertitle-location">';
                                        $county = getCountyFromLocationID($profie_data[13]);
                                        echo $county[0];
                                    echo '</div>';
                                    echo '<div class="profile-usertitle-name">';
                                        echo '<input type="hidden" name="connectionId" value=' . $list_of_connection_ids[$connectionIdCount] . '/>';
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="profile-userbuttons">';
                                    echo '<button name="like-button" type="submit" class="btn btn-danger btn-sm">Delete Request</button>';
                                    //echo '<button type="button" class="btn btn-danger btn-sm">Dislike</button>';
                                echo '</div>';
                            echo '</div>';
                            echo '</form>';
                        echo '</div>';
                        $connectionIdCount = $connectionIdCount + 1;
}
?>

                    </div>
                </div>
            </div>
        </div>
    </div>
                
            </div>
        </div>
    </div>
 
    <!-- Bootstrap 5.0 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>

</html>
