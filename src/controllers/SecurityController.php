<?php

use models\User;

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';

class SecurityController extends AppController {
    public function login() {
        $user = new User("marik1234", "smiesznekotki@gmail.com", "lubieplacki");

        $username_email = $_POST["username_email"];
        $password = $_POST["password"];

        if ($password !== $user->getPassword()) {
            return $this->render('login', ['login_messages' => ['Password does not match!']]);
        }

    }

    public function register() {
        $user = new User("marik1234", "smiesznekotki@gmail.com", "lubieplacki");

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeate_password = $_POST["repeate_password"];

        if ($password !== $repeate_password) {
            return $this->render('login', ['signin_messages' => ['Passwords are not the same!']]);
        }
        return $this->render('project');
    }


}