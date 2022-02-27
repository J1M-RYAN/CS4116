<?php
require "init.php";

class Database
{
    protected $Pdo;
    protected static $instance;
    protected function __construct()
    {
        $this->Pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    public function __call($name, $arguments)
    {
        call_user_func_array(array($this->Pdo, $name), $arguments);
    }
}
