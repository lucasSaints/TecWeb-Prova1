<?php
    namespace App\FrameworkTools\Database;
    use PDO;
    class DatabaseConnection {
        private static $instance;
        private $pdo;
        
        private function __construct() {
            $database = env('DB_DATABASE'); 
            $user = env('DB_USER'); 
            $password = env('DB_PASSWORD'); 
            $host = env('DB_HOST'); 
            $port = env('DB_PORT');

            $this->pdo = new PDO(
                "mysql:host=127.0.0.1;dbname=car;port=776;",  
                "root",
                ""
            );
        }

        public static function start() {
            if (!DatabaseConnection::$instance) 
                DatabaseConnection::$instance = new DatabaseConnection();
            return DatabaseConnection::$instance;
        }

        public function getPDO() { return $this->pdo; }
    }
?>