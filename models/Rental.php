<?php
require_once dirname(__DIR__) . '../config/database.php';

class Rental
{

    private $table = 'rentals';
    private $conn;

    public $id;
    public $car_id;
    public $user_id;
    public $order_date;
    public $pickup_date;
    public $dropoff_date;
    public $pickup_location;
    public $dropoff_location;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . '(car_id, user_id, pickup_date, dropoff_date, pickup_location, dropoff_location) VALUES (:car_id, :user_id, :pickup_date, :dropoff_date, :pickup_location, :dropoff_location)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':car_id', $this->car_id);
        $stmt->bindParam(':user_id', $this->user_id);
        // $stmt->bindParam(':order_date', $this->order_date);
        $stmt->bindParam(':pickup_date', $this->pickup_date);
        $stmt->bindParam(':dropoff_date', $this->dropoff_date);
        $stmt->bindParam(':pickup_location', $this->pickup_location);
        $stmt->bindParam(':dropoff_location', $this->dropoff_location);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete()
    {
        $query = 'DELETE FROM' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public static function findByUserId($user_id)
    {

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

    public static function findAll()
    {
        $database = new Database();
        $conn = $database->connect();
        $query = 'SELECT * FROM rentals';
        $stmt = $conn->prepare($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
