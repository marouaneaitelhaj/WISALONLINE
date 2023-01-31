<?php
class Database
{
    public static $dsn = "mysql:host=localhost;dbname=WiSalonline";
    public static $username = 'root';
    public static $password = '';
    public $conn;

    public function connect()
    {
        try {
            $this->conn = new PDO(self::$dsn, self::$username, self::$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function __construct()
    {
        $this->connect();
    }
}