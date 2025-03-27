<?php
class User {
    private $db;

    public function __construct() {
        $this->db = getDBConnection();
    }

    public function login($username, $password) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM USER WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            }
            return false;
        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return false;
        }
    }
}   