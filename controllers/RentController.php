<?php
require_once '../config/database.php';
require_once '../models/Rental.php';
require_once '../models/Car.php';
class RentController
{

    public function rentCar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // var_dump($_POST);
            // die();
            session_start();
            $car_id = $_POST['car_id'];
            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];
            $user_id = $_SESSION['user_id'];
            $status = 'rented';
            $pickup_date = $_POST['pickup_date'];
            $dropoff_date = $_POST['dropoff_date'];
            $pickup_location = $_POST['pickup_location'];
            $dropoff_location = $_POST['dropoff_location'];


            $rental = new Rental();
            $rental->car_id = $car_id;
            $rental->user_id = $user_id;
            // var_dump($status);
            $rental->pickup_date = $pickup_date;
            $rental->dropoff_date = $dropoff_date;
            $rental->pickup_location = $pickup_location;
            $rental->dropoff_location = $dropoff_location;
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
            } else {
                echo 'something went wrong';
            }
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $rental = new Rental();
            $rental->id = $id;
            if ($rental->delete()) {
                echo 'rental has been deleted';
            } else {
                echo 'rental do not deleted';
            }
        }
    }
    public function allRentals()
    {
        $rentals = Rental::findAll();
    }
}
