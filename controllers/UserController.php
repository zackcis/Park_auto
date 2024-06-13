<?php
require_once '../models/User.php';

class UserController
{

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
            $role = 'user';

            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = $password;
            $user->role = $role;

            if ($user->create()) {
                header('Location: ../views/auth/login.php');
            } else {
                echo 'something went wrong rak matsjltich';
            }
        } else {
            require '../views/auth/register.php';
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $confirm_data = User::findByUsername($username);
            // var_dump($confirm_data);
            // die();
            if ($confirm_data && password_verify($password, $confirm_data['password'])) 
            {
                session_start();
                $_SESSION['user_id'] = $confirm_data['id'];
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $confirm_data['role'];
                header('Location: ../views/user/index.php');
            } 
            else 
            {
                echo 'Login failed something went wrong ahbibi';
                require '../views/auth/login.php';
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: ../views/auth/login.php');
        exit();
    }
}
