<?php
class DatabaseConnection {
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $dsn = "pgsql:host=localhost;dbname=nexus";
            $username = "postgres";
            $password = "root";
    
            $this->connection = new PDO($dsn, $username, $password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }


    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    private function clone() {}
}

?>