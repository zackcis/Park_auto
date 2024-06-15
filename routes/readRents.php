<?php

require_once dirname(__DIR__) . '../models/Rental.php';

function getAllRents(){
    $rental = new Rental;
    $rental->findAll();
}