<?php 

require_once dirname(__DIR__) . '../config/database.php';
class Car {

    private $conn;
    private $table = 'cars';

    public $id;
    public $model;
    public $mark;
    public $registration_number;
    public $status;


    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table . '(model, mark, registration_number, status) VALUES (:model, :mark, :registration_number, :status)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':mark', $this->mark);
        $stmt->bindParam(':registration_number', $this->registration_number);
        $stmt->bindParam(':status', $this->status);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET model = :model, mark = :mark, registration_number = :registration_number, status = :status WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        // Bind parameters

        $stmt->bindParam(':model', $this->model);
        $stmt->bindParam(':mark', $this->mark);
        $stmt->bindParam(':registration_number', $this->registration_number);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':id', $this->id);
        
        try {
            if ($stmt->execute()) {

                return true; // Return true if update was successful
            } else {
                echo "Execute failed: " . $stmt->errorCode(); // Check for execution errors
                return false;
            }
        } catch (PDOException $e) {
            echo "Update error: " . $e->getMessage(); // Display specific PDOException message
            return false;
        }
    }
    
    
    public function delete(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {

            return true;
        }
        return false;

    }
    public static function findAll(){
        $database = new Database();
        $conn = $database->connect();
        $query = 'SELECT * FROM cars';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }



}