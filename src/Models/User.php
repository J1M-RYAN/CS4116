<?php

class User
{
    protected $mysqli;
    private $table = 'User';

    public function __construct()
    {
        $this->mysqli = Database::instance();
    }
    public function emailExists($email)
    {

        $stmt = $this->mysqli->prepare("SELECT * FROM User WHERE Email=?;");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if (!$result) {
            trigger_error('Invalid query: ' . $this->mysqli->error);
        }
        return $result->num_rows == 1;
    }

    public function getUserFromEmail($email)
    {

    }

    public function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function getNumberMales(){
        $result = $this->mysqli->query("SELECT COUNT(*) AS `count`
        FROM User
        INNER JOIN Profile
        ON User.UserID = Profile.UserID
        WHERE User.UserType='User' AND Gender='Male';");
        $row = $result->fetch_assoc();
        return $row["count"];
    }

    public function getNumberFemales(){
        $result = $this->mysqli->query("SELECT COUNT(*) AS `count`
        FROM User
        INNER JOIN Profile
        ON User.UserID = Profile.UserID
        WHERE User.UserType='User' AND Gender='Female';");
        $row = $result->fetch_assoc();
        return $row["count"];
    }

    public function getTotalUserCound(){
        $result = $this->mysqli->query("SELECT COUNT(*) AS `count`
        FROM User;");
        $row = $result->fetch_assoc();
        return $row["count"];
    }

    public function getTotalUsersOnlineLastHour(){
        SELECT COUNT(*) AS `count`
        FROM User
        WHERE TIMESTAMPDIFF(HOUR,User.LastLoginTime ,CURRENT_TIMESTAMP())< 1;
    }
}
