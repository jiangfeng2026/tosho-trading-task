<?php

namespace Songjiangfeng\Loginregister;

final class Auth{
    private $pdo;

    private function __construct() {
        $host = 'localhost'; 
        $dbname = 'db'; 
        $user = 'root'; 
        $pass = 'root';
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        try {
            $this->pdo = new \PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    final static function register($username, $password) {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            echo "Username already exists.";
            return false;
        }
        try {
            $this->pdo->beginTransaction();
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed]);
            $this->pdo->commit();
            echo "Registration successful.";
            return true;
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            echo "Registration failed.";
            return false;
        }
    }

    final static function login($username, $password) {
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if ($row && password_verify($password, $row['password'])) {
           
            echo "Login successful.";
            return true;
        }
        return false;
    }
}