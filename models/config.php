<?php

//namespace Models;


class Database {
    private $pdo;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        define('DB_HOST','127.0.0.1');
        define('DB_NAME', 'locationdevoiture');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '');

        try {
            $this->pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
