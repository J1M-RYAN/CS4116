<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// dev env constants
define("DB_HOST", "db");
define("DB_NAME", "dating_db");
define("DB_USER", "root");
define("DB_PASS", "secret");
define("BASE_URL", "http://localhost:8080");

include_once './constants.php';
include_once './Models/User.php';
include_once './Database.php';

$userObj = new User();
