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

  <!-- Main Css File only for header and footer component-->
  <link rel="stylesheet" href="./assets/css/main.css">

  <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!--------Internal style sheet strats here-->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        .create-profile {
            min-height: 170vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-image: url(assets/images/bg-pg.png);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .crt-profile {
            max-width: 700px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.692);
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }
        .crt-profile .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }
        .crt-profile.title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: #dd314e;
        }
        .content-cp form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }
        input[type="file"] {
            padding-top: 7px;
            padding-right: 8px;
        }
        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }
        form .input-box span.details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }
        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px;
            padding-left: 15px;
            border: 1px solid rgb(255, 255, 255);
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }
        .user-details .input-box input:focus,
        .user-details .input-box input:valid {
            border-color: #dd314e;
        }
        form .gender-details .gender-title,
        .smoker-title,
        .seeking-title,
        .have-children-title {
            font-size: 20px;
            font-weight: 500;
        }
        form .category {
            display: flex;
            width: 80%;
            margin: 14px 0;
            justify-content: space-between;
        }
        form .category label {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        form .category label .dot {
            height: 18px;
            width: 18px;
            border-radius: 50%;
            margin-right: 10px;
            background: #ffffff;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }
        #dot-1:checked~.category label .one,
        #dot-2:checked~.category label .two,
        #dot-3:checked~.category label .three,
        #dot-4:checked~.category label .four,
        #dot-5:checked~.category label .five,
        #dot-6:checked~.category label .six {
            background: #dd314e;
            border-color: #ffffff;
        }
        form input[type="radio"] {
            display: none;
        }
        form .button {
            height: 45px;
            margin: 35px 0
        }
        form .button input {
            height: 100%;
            width: 100%;
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
        form .button input:hover {
            /* transform: scale(0.99); */
            background: #391866;
        }
        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }
            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }
            form .category {
                width: 100%;
            }
            .content form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }
            .user-details::-webkit-scrollbar {
                width: 5px;
            }
        }
        
    </style>
    <!--------Internal style sheet ends here---->
</head>

<body>

    <?php require './navbar.php'?>
<div class="create-profile">
    <div class="container crt-profile">
        <div class="title">Create Profile</div>
        <div class="content-cp">
            <form action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="number" min="18" max="200" name ="age" placeholder="Enter your age" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Height</span>
                        <input type="text" pattern="[1-9]{1}-[0-11]{1,2}" name="height" placeholder="Enter your height(feet-inches ie 6-5)" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Star Sign</span>
                        <select name="starsign">
                            <option value="Aries">Aries</option>
                            <option value="Taurus">Taurus</option>
                            <option value="Gemini">Gemini</option>
                            <option value="Cancer">Cancer</option>
                            <option value="Leo">Leo</option>
                            <option value="Virgo">Virgo</option>
                            <option value="Libra">Libra</option>
                            <option value="Scorpio">Scorpio</option>
                            <option value="Sagittarius">Sagittarius</option>
                            <option value="Capricorn">Capricorn</option>
                            <option value="Aquarius">Aquarius</option>
                            <option value="Pisces">Pisces</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Religion</span>
                        <select name="religion">
                            <option value="Athiest">Athiest</option>
                            <option value="Christian">Christian</option>
                            <option value="Judaism">Judaism</option>
                            <option value="Buddhism">Buddhism</option>
                            <option value="Islam">Islam</option>
                            <option value="Sikhism">Sikhism</option>
                            <option value="Hinduism">Hinduism</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Loaction</span>
                        <select name="loaction">
                            <option value="antrim">Antrim</option>
                            <option value="armagh">Armagh</option>
                            <option value="carlow">Carlow</option>
                            <option value="cavan">Cavan</option>
                            <option value="clare">Clare</option>
                            <option value="cork">Cork</option>
                            <option value="derry">Derry</option>
                            <option value="donegal">Donegal</option>
                            <option value="down">Down</option>
                            <option value="dublin">Dublin</option>
                            <option value="fermanagh">Fermanagh</option>
                            <option value="galway">Galway</option>
                            <option value="kerry">Kerry</option>
                            <option value="kildare">Kildare</option>
                            <option value="kilkenny">Kilkenny</option>
                            <option value="laois">Laois</option>
                            <option value="leitrim">Leitrim</option>
                            <option value="limerick">Limerick</option>
                            <option value="longford">Longford</option>
                            <option value="louth">Louth</option>
                            <option value="mayo">Mayo</option>
                            <option value="meath">Meath</option>
                            <option value="monaghan">Monaghan</option>
                            <option value="offaly">Offaly</option>
                            <option value="roscommon">Roscommon</option>
                            <option value="sligo">Sligo</option>
                            <option value="tipperary">Tipperary</option>
                            <option value="tyrone">Tyrone</option>
                            <option value="waterford">Waterford</option>
                            <option value="westmeath">Westmeath</option>
                            <option value="wexford">Wexford</option>
                            <option value="wicklow">Wicklow</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Intrests</span>
                        <select name="intrests">
                            <option value="Reading">Reading</option>
                            <option value="Woodworking">Woodworking</option>
                            <option value="Gardening">Gardening</option>
                            <option value="Video Games">Video Games</option>
                            <option value="Fishing">Fishing</option>
                            <option value="Walking">Walking</option>
                            <option value="Yoga">Yoga</option>
                            <option value="Traveling">Traveling</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" name="description" placeholder="description about you" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload your photo</span>
                        <input type="file" placeholder="Upload your photo">
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1">
                    <input type="radio" name="gender" id="dot-2">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                    </div>
                </div>
                <div class="smoker-details">
                    <input type="radio" name="smoker" id="dot-3">
                    <input type="radio" name="smoker" id="dot-4">
                    <span class="smoker-title">Smoker</span>
                    <div class="category">
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="smoker">Yes</span>
                        </label>
                        <label for="dot-4">
                            <span class="dot four"></span>
                            <span class="smoker">No</span>
                        </label>
                    </div>
                </div>
                <div class="seeking-details">
                    <input type="radio" name="seeking" id="dot-5">
                    <input type="radio" name="seeking" id="dot-6">
                    <span class="seeking-title">Seeking</span>
                    <div class="category">
                        <label for="dot-5">
                            <span class="dot five"></span>
                            <span class="seeking">Male</span>
                        </label>
                        <label for="dot-6">
                            <span class="dot six"></span>
                            <span class="seeking">Female</span>
                        </label>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Save">
                </div>
            </form>
        </div>
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
