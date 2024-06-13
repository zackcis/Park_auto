<?php 

require_once '../config/database.php';
class Car {

    private $conn;
    private $table = 'cars';

    public $id;
    public $model;
    public $mark;
    public $registration_number;


    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table . '(model, mark, registration_number) VALUES (:model, :mark, :registration_number)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':mark', $this->mark);
        $stmt->bindParam(':registration_number', $this->registration_number);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function update(){
        $query = 'UPDATE ' . $this->table . 'SET model = :model, mark = :mark, registration_number = :registration_number';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':mark', $this->mark);
        $stmt->bindParam(':registration', $this->registration_number);
        $stmt->bindParam(':id', $this->id);
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



}