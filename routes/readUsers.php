<?php

require_once dirname(__DIR__) . '../models/User.php';

function getAllUsers(){

    $user = new User();
    return $user::findAllUser();

}