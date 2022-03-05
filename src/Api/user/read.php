<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../Database.php';
include_once '../../Models/User.php';

$db = Database::instance();

$user = new User($db);

$result = $user->read();

$num = $result->rowCount();

if ($num > 0) {
    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $post_item = array(
            'UserID' => $UserID,
            'Email' => $Email,
            'Firstname' => $Firstname,
            'Surname' => $Surname,
            'UserType' => $UserType,
        );
        array_push($post_arr['data'], $post_item);
    }
    echo json_encode($post_arr);
} else {
    echo 'Nothing found';
}
