<?php 

require_once '../models/Car.php';


class CarController{

    public function create(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];
            // $registration_number = $_POST['registration_number'];

            $car = new Car();
            $car->model = $model; 
            $car->mark = $mark; 
            $car->registration_number = $registration_number; 

            if ($car->create()) {
                // echo 'car was created successfully';
                header('Location: ../views/admin/car_management.php');
            }else{
                echo 'something went wrong';
            }



        }



    }
    public function update(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];
            $car = new Car();
            if ($car->update()) {
                echo 'car updated';
            }else {
                echo 'something went wrong';
            }
        }





    }



}