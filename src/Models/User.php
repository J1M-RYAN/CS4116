<?php

class User
{
    protected $db;
    private $table = 'User';

    public function __construct()
    {
        $this->db = Database::instance();
    }
    public function emailExists($email)
    {

        $stmt = $this->db->prepare('SELECT * FROM User;');
        if (!$stmt) {
            echo 'Error with stmt';
            return 0;
        }
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount() == 1;
    }

    public function getUserFromEmail($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM `User` WHERE `Email` = :email');
        if ($stmt) {

            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();} else {
            echo 'Somethings up here';
            echo 'stmt: ' . $stmt;
        }
        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function hash($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

}
