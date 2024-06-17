<?php
 require_once dirname(__DIR__) . '/controllers/CarController.php';
 $carController = new CarController();
 $carController->delete();