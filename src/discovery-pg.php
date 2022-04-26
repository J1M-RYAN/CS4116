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

    <!-- Main Css File for header and footer component -->
  <link rel="stylesheet" href="./assets/css/main.css">

  <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        :root {
            --main: #e22c38;
            --main-light: #e22c382a;
            --radius: 12px;
        }

        body {
            
            background-image: url(assets/images/bg-pg.png);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .text-main {
            color: var(--main) !important;
        }

        .bg-main {
            background-color: var(--main) !important;
        }

        .btn,
        input:not(.form-check-input),
        select {
            height: 48px !important;
            border-radius: var(--radius) !important;
        }

        .input:focus,
        textarea:focus {
            box-shadow: 0px 0px 0px 0px !important;
        }
        .fltr-btn {
            padding: 10px 30px 20px 30px;
            background: #dd314e;
        }

        .fltr-btn:hover {
            background: #391866;
        }

        .radius {
            border-radius: var(--radius);
        }

        #navbar {
            transition: .5s;
        }

        .avatar {
            height: 100px;
        }

        @media screen and (max-width: 768px) {
            .d-mobile-block {
                display: block !important;
            }
        }

        /*--- profile card---*/
        .profile-usertitle {
            text-align: center;
            margin-top: 20px;
        }

        .profile-usertitle-name {
            color: #5a7391;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .profile-usertitle-age {
            text-transform: uppercase;
            color: #5b9bd1;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .profile-userbuttons {
            text-align: center;
            margin-top: 10px;
        }

        .profile-userbuttons .btn {
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 600;
            padding: 6px 15px;
            margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
            margin-right: 0px;
        }

        .box-card {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
    </style>

    <title>Starter</title>
</head>

<body>
    
<?php require './navbar.php'?>
    <div class="discovery-pg">

    <!-- Filter Form -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card radius">
                        <div class="card-header text-center h1 fw-bolder">DISCOVER</div>
                        <div class="card-body">
                            <div class="d-flex d-mobile-block my-4">
                                <div class="col px-3">
                                    <label for="location">County</label>
                                    <select class="form-control" name="county" placeholder="County">
                                    <?php
include_once "functions.inc.php";
$list_of_enums = getEnumList("Location", "County");
echo '<option disabled selected value> -- select an option -- </option>';
$valueCount = 1;
foreach ($list_of_enums as $county) {
    echo '<option value=' . $valueCount . '>' . $county . '</option>';
    $valueCount = $valueCount + 1;
}
?>
                                    </select>
                                </div>
                                <div class="col px-3">
                                    <label for="religion">Religion</label>
                                    <select class="form-control" name="religion" placeholder="Religion">
                                    <?php
include_once "functions.inc.php";
$list_of_enums = getEnumList("Profile", "Religion");
echo '<option disabled selected value> -- select an option -- </option>';
foreach ($list_of_enums as $religion) {
    echo '<option value=' . $religion . '>' . $religion . '</option>';
}
?>
                                    </select>
                                </div>
                                <div class="col px-3">
                                    <label for="star_sign">Star Sign</label>
                                    <select class="form-control" name="starsign"
                                        placeholder="Star Sign"><?php
include_once "functions.inc.php";
$list_of_enums = getEnumList("Profile", "StarSign");
echo '<option disabled selected value> -- select an option -- </option>';
foreach ($list_of_enums as $StarSign) {
    echo '<option value=' . $StarSign . '>' . $StarSign . '</option>';
}
?>
                                    </select>
                                </div>
                                <div class="col px-3">
                                    <label for="star_sign">Interests</label>
                                    <select class="form-control" name="interests"
                                        placeholder="Interests">
                                        <?php
include_once "functions.inc.php";
$list_of_enums = getRowFromTable("AvailableInterests", "InterestName");
echo '<option disabled selected value> -- select an option -- </option>';
$valueCount = 1;
foreach ($list_of_enums as $interestName) {
    echo '<option value=' . $valueCount . '>' . $interestName . '</option>';
    $valueCount = $valueCount + 1;
}
?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex d-mobile-block my-4">
                                
                                <div class="col px-3">
                                    <label>Filtering Age</label>
                                    <div>
                                        <label for="min_age">Min Age</label>
                                        <input value="18"
                                            onchange="document.querySelector('#min_age_output').textContent = this.value"
                                            type="range" id="min_age" class="form-control form-range" min="18" max="60"
                                            placeholder="Minimum age">
                                        <span id="min_age_output">18</span>
                                    </div>
                                    <div>
                                        <label for="max_age">Max Age</label>
                                        <input value="50"
                                            onchange="document.querySelector('#max_age_output').textContent = this.value"
                                            type="range" id="max_age" class="form-control form-range" min="18" max="60"
                                            placeholder="Maximum age">
                                        <span id="max_age_output">50</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex d-mobile-block my-4">
                                
                                <div class="col px-3">
                                    <label for="smoker">Smoker</label>
                                    <select class="form-control" name="smoking" placeholder="Smoker">
                                    <?php
include_once "functions.inc.php";
$list_of_enums = getEnumList("Profile", "Smoking");
echo '<option disabled selected value> -- select an option -- </option>';
foreach ($list_of_enums as $smokingOptions) {
    echo '<option value="' . $smokingOptions . '">' . $smokingOptions . '</option>';
}
?>
                                    </select>
                                </div>
                                <div class="col px-3">
                                    <label for="drinker">Drinker</label>
                                    <select class="form-control" name="drinking" placeholder="Drinker">
                                    <?php
include_once "functions.inc.php";
$list_of_enums = getEnumList("Profile", "Drinking");
echo '<option disabled selected value> -- select an option -- </option>';
foreach ($list_of_enums as $drinkingOptions) {
    echo '<option value="' . $drinkingOptions . '">' . $drinkingOptions . '</option>';
}
?>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary fltr-btn">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Filter Form -->
<!-- Discovery Results -->
<div class="container-fluid p-3 my-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <?php
include_once "functions.inc.php";
$list_of_userIds = getUserIds();
?>
                <div class="card radius p-4">
                    <?php $totalUsers = count($list_of_userIds);
                    echo '<p class="h2">' . $totalUsers . ' results </p>'; ?>
                    <div class="row">
                    <?php
                    include_once "functions.inc.php";
                    foreach ($list_of_userIds as $userId) {
                        $profie_data = getProfileDetails($userId);
                        $list_of_user_details = getUserDetails($userId);
                        echo '<div class="col-md-3 mb-3 prof-card">';
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
                                echo '</div>';
                                echo '<div class="profile-userbuttons">';
                                    echo '<button type="button" class="btn btn-success btn-sm">Like</button>';
                                    echo '<button type="button" class="btn btn-danger btn-sm">Dislike</button>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- / Results -->


    <!-- Bootstrap 5.0 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

    <script src="./assets/js/main.js"></script>

</body>

</html>