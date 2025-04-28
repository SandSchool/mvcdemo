<?php
require_once __DIR__ . '/../../Core/database.php';
class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function getAllUsers()
    {
        $stmt = $this->db->prepare("SELECT * FROM users ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createUser($fullname, $username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (fullname, username, password) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$fullname, $username, $hashedPassword]);
        return $this->db->lastInsertId();
    }
}
