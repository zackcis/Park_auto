<?php 
require_once '../config/database.php';
require_once '../models/Rental.php';
require_once '../models/Car.php';
class RentController {

    public function rentCar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $car_id = $_POST['car_id'];
            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];
            $user_id = $_SESSION['user_id'];
            $status = 'rented';
            $return_date = $_POST['return_date'];


            $rental = new Rental();
            $rental->car_id = $car_id;
            $rental->user_id = $user_id;
            var_dump($status);
            $rental->return_date = $return_date;
            if ($rental->create()) {
                // $rental = new Rental();
                $car = new Car();
                $car->id = $car_id;
                $car->model = $model; 
                $car->mark = $mark; 
                $car->registration_number = $registration_number;
                $car->status = $status;
                $car->update();
                header('Location:  ../views/user/user_panel.php');
            }else{
                echo 'something went wrong';
            }
        }

    }
    public function delete(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $rental = new Rental();
            $rental->id = $id;
            if ($rental->delete()) {
                echo 'rental has been deleted';

            }else {
                echo 'rental do not deleted';
            }
        }




    }
    public function allRentals(){
        $rentals = Rental::findAll();
        

    }


}