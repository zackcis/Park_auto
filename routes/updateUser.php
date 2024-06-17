<?php
require_once dirname(__DIR__) . '../controllers/UserController.php';

$userController = new UserController();

$userController->update();