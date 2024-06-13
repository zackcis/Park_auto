<?php 

require_once '../models/Car.php';

class CarController{

    public function create(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];

            $car = new Car();
            $car->model = $model; 
            $car->mark = $mark; 
            $car->registration_number = $registration_number; 

            if ($car->create()) {
                echo 'car was created successfully';
            }else{
                echo 'something went wrong';
            }

        }



    }



}