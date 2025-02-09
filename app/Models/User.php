<?php

namespace App\Models;
require_once __DIR__ . '/../core/Database.php';
use App\core\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function all()
    {
        return $this->db->query("SELECT * FROM users")->fetchAll();
    }

    public function find($email)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();
    }

    public function findById($id)
    {
        return $this->db->query("SELECT * FROM users WHERE id = ?", [$id])->fetch();
    }

    public function create($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->db->query(
            "INSERT INTO users (name, email, password) VALUES (?, ?, ?)",
            [$name, $email, $hashedPassword]
        );
    }

    public function update($id, $name, $email, $password = null)
    {
        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            return $this->db->query(
                "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?",
                [$name, $email, $hashedPassword, $id]
            );
        }

        return $this->db->query(
            "UPDATE users SET name = ?, email = ? WHERE id = ?",
            [$name, $email, $id]
        );
    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM users WHERE id = ?", [$id]);
    }
}