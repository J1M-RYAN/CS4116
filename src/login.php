<?php
include_once './init.php';

$myEmail = 'jim@jim.com';
$loginUser = new User();
if ($loginUser->emailExists($myEmail)) {
    echo $myEmail . ' is in the database';
}
