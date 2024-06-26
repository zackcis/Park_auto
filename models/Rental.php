<?php
require_once dirname(__DIR__) . '../config/database.php';

class Rental
{

    private $table = 'rentals';
    private $conn;

    public $id;
    public $car_id;
    public $user_id;
    public $rental_date;
    public $return_date;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . '(car_id, user_id, return_date) VALUES (:car_id, :user_id, :return_date)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':car_id', $this->car_id);
        $stmt->bindParam(':user_id', $this->user_id);
        // $stmt->bindParam(':rental_date', $this->rental_date);
        $stmt->bindParam(':return_date', $this->return_date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

     public function delete(){
        $query ='DELETE FROM' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        
        if ($stmt->execute()) {
           return true;
        }
        return false;

     }

    public static function findByUserId($user_id){

        $database = new Database();
        $conn = $database->connect();
        $query = 'SELECT * FROM rentals WHERE :user_id = user_id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    // public function update(){
    //     $query = 'UPDATE ' . $this->table .'SET status = :status WHERE id = :id';
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bindParam(':status', $this->status)
    // }

    public static function findAll(){
        $database = new Database() ;
        $conn =$database->connect();
        $query = 'SELECT * FROM rentals';
        $stmt = $conn->prepare($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
