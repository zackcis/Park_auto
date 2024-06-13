<?php

require_once '../config/database.php';

class User
{
    private $conn;
    private $table = 'users';


    public $id;
    public $username;
    public $email;
    public $password;
    public $role;



    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create()
    {

        $query = 'INSERT INTO ' . $this->table . '(username, email, password, role) VALUES (:username, :email, :password, :role)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update(){
        $query = 'UPDATE ' . $this->table . 'SET username = :username, email = :email, password = :password, role = :role';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam('password', $this->password);
        $stmt->bindParam(':role', $this->role);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete(){
        $query = 'DELETE FROM ' . $this->table . 'WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public static function findByEmail()
    {

        $database = new Database();
        $conn = $database->connect();
        $query = 'SELECT * FROM users WHERE email = :email';
        $stmt = $conn->prepare($query);
        $stmt->bindParam('email', $email);
        $stmt->execute();


        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
