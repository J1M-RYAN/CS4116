<?php

class Database
{
    protected $pdo;
    protected static $instance;
    protected function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo 'Database connection error: ' . $error->getMessage();
        }
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
        call_user_func_array(array($this->pdo, $name), $arguments);
    }
}
