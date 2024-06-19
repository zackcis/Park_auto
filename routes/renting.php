<?php
require_once dirname(__DIR__) . '../controllers/RentController.php';

$rentController = new RentController();
$rentController->rentCar();
