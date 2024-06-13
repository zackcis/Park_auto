<?php 
require_once '../config/database.php';
require_once '../models/Rental.php';
class RentController {

    public function rentCar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $car_id = $_POST['car_id'];
            $user_id = $_SESSION['user_id'];
            $rental_date = $_POST['rental_date'];
            $return_date = $_POST['return_date'];


            $rental = new Rental();
            $rental->car_id = $car_id;
            $rental->user_id = $user_id;
            $rental->rental_date = $rental_date;
            $rental->return_date = $return_date;
            if ($rental->create()) {
                echo 'rental created successfully';
            }else{
                echo 'something went wrong';
            }
        }


    }
    public function allRentals(){
        $rentals = Rental::findAll();
        

    }


}