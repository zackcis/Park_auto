<?php
require_once '../models/User.php';

class UserController
{

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();


            $role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user';
            // var_dump($role);
            // die();
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);
            $userRole = empty($_POST['role']) ? 'user' : trim($_POST['role']);


            $error = [];

            if (empty($username)) {
                $error[] = 'username is requierd';
            }
            if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'valid email is requiered';
            }
            if (empty($password)) {
                $error[] = 'password is requierd';
            }
            if ($password != $confirmPassword) {
                $error[] = 'passwordS are not the same';
            }
            if (strlen($password) < 6) {
                $error[] = 'password must be more tha 6 charachters';
            }
            if (empty($error)) {
                $confirmUsername = User::findByUsername($username);
                if (!empty($confirmUsername)) {
                    $error[] = 'this user named already taken';
                }
                $confirmEmail = User::findByEmail($email);
                if (!empty($confirmEmail)) {
                    $error[] = 'the email email should be unique';
                }
            }
            if (empty($error)) {

                $password = password_hash($password, PASSWORD_BCRYPT);
                $user = new User();
                $user->username = $username;
                $user->email = $email;
                $user->password = $password;
                $user->role = $userRole;

                if ($user->create()) {
                    // $_SESSION['user_id'] = $user->id;
                    // $_SESSION['username'] = $username;
                    // $_SESSION['role'] = $role;
                    if ($role == 'admin') {
                        header('Location:  ../views/admin/user_management.php');
                        exit();
                    }
                    header('Location: ../views/auth/login.php');
                    exit();
                } else {
                    $error[] = 'user has been not created azin dyali';
                }
            }
            foreach ($error as $errori) {
                echo '<p>' . $errori . '</p>';
                require '../views/auth/register.php';
            }
        }

        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $username = $_POST['username'];
        //     $email = $_POST['email'];
        //     $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        //     $role = 'user';

        //     $user = new User();
        //     $user->username = $username;
        //     $user->email = $email;
        //     $user->password = $password;
        //     $user->role = $role;

        //     if ($user->create()) {
        //         header('Location: ../views/auth/login.php');
        //     } else {
        //         echo 'something went wrong rak matsjltich';
        //     }
        // } else {
        //     require '../views/auth/register.php';
        // }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $confirm_data = User::findByUsername($username);
            // var_dump($confirm_data);
            // die();
            if ($confirm_data && password_verify($password, $confirm_data['password'])) {
                session_start();
                $_SESSION['user_id'] = $confirm_data['id'];
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $confirm_data['role'];
                header('Location: ../views/user/index.php');
            } else {
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
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $id = $_POST['id'];
            $role = $_POST['role'];
            $user = new User();



            $user->username = $username;




            $user->email = $email;




            $user->role = $role;
            $user->id = $id;

            if ($user->update()) {
                echo 'user updated';
            } else {
                echo 'something went wrong azin dyali';
            }
        }
    }
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $user = new User();
            $user->id = $id;
            if ($user->delete()) {
                echo 'user Deleted';
            }
        }
    }
}
