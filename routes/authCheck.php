<?php
session_start();    
function authCheck(){

        if (!isset($_SESSION['user_id'])) {
            header('Location: ../auth/login.php');
            exit();
        }
}