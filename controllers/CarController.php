<?php 

require_once '../models/Car.php';


class CarController{

    public function create(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];
            $status = $_POST['status'];
            // $registration_number = $_POST['registration_number'];

            $car = new Car();
            $car->model = $model; 
            $car->mark = $mark; 
            $car->registration_number = $registration_number; 
            $car->status = $status; 

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
            $id = $_POST['id'];
            $model = $_POST['model'];
            $mark = $_POST['mark'];
            $registration_number = $_POST['registration_number'];
            $status = $_POST['status'];

            // var_dump($status);
            // die();
            $car = new Car();
            $car->id = $id;
            $car->model = $model; 
            $car->mark = $mark; 
            $car->registration_number = $registration_number; 
            $car->status = $status;
            if ($car->update()) {
                echo 'car updated';
                header('Location: ../views/admin/car_management.php');
            }else {
                echo 'something went wrong';
            }
        }

    }
    public function delete(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $car = new Car();
            $car->id = $id;
            if ($car->delete()) {
                header('Location: ../views/admin/car_management.php');
            }else {
                echo 'something went wrong';
            }
        }
    }



}