<?php
require_once dirname(__DIR__) . '/models/Car.php';

function getAllCars() {
    $car = new Car();
    return $car->findAll();
}
?>