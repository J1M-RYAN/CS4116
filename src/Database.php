<?php

class Database
{
    public static function instance()
    {
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        return $mysqli;
    }
    public function __call($name, $arguments)
    {
        call_user_func_array(array($this->mysqli, $name), $arguments);
    }
}
