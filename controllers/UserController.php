<?php
require_once '../models/User.php';
class UserController {

public function register(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = ['user'];

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->role = $role;

        if ($user->create()) {
            header('Location: login.php');
        }else{
            echo 'something went wrong rak matsjltich';
        }

    }else {
        require '../views/auth/register.php';
    }




}



}