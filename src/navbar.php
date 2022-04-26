
<!-- Header Start -->
  <div class="container-fluid py-3" style="background: #371661;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background: #371661;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="./assets/images/Logo.png" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--  -->
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="/contact">Contact</a>
                        </li>

                        <?php 
                            if(isset($_SESSION["userEmail"])){
                                echo "<li class='nav-item'><a class='nav-link mx-2' href='/discovery-pg'>Discover</a></li>";
                                echo "<li class='nav-item'><a class='nav-link mx-2' href='/main-profile-pg'>Profile</a></li>";
                                echo "<li class='nav-item'>
                                <a href='/logout.inc.php'>
                                <button class='btn btn-red rounded-0 py-2 mx-2'><i class='fa fa-user'></i> LOG
                                    OUT</button>
                                </a></li>";
                            } else {
                                echo "<li class='nav-item'>
                                <a href='/login'>
                                <button class='btn btn-white rounded-0 py-2 mx-2'><i class='fa fa-user'></i> LOG
                                    IN</button>
                                </a>
                                <a href='/signup'><button class='btn btn-red rounded-0 py-2 mx-2'><i class='fa fa-user'></i> SIGN
                                    UP</button></a>
                            </li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
