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

        $result = $this->mysqli->query('SELECT * FROM User;');
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

}
