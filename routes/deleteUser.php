<?php

require_once dirname(__DIR__) . '../controllers/UserController.php';
$usercontroller = new UserController();
$usercontroller->delete();