<?php

use models\User;
use repository\UserRepository;

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repository/UserRepository.php';

class SecurityController extends AppController {
    public function login() {
        $username_email = $_POST["username_email"];
        $password = $_POST["password"];

        if ((strlen($username_email) < 1) || (strlen($password) < 1)) {
            return $this->render('login', ['login_messages' => ['All fields required!']]);
        }

        $userRepository = new UserRepository();
        $user = $userRepository->getUser($username_email);


        if ($user == null) {
            return $this->render('login', ['login_messages' => ['An account with username or email you entered does not exist']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['login_messages' => ['Wrong password!']]);
        }

        //$cookie_name = "user_id";
        //$cookie_value = $this->encryptIt($userRepository->getId($user->getEmail()));

        //setcookie($cookie_name, $cookie_value, 0, "/");

        //$cookie_name = "register_data_input";
        //$cookie_value = 1;
        //setcookie($cookie_name, $cookie_value, 0, "/");
        return $this->render('mainpage');
    }

    public function register()
    {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 12,]);

        if(strlen($username) < 1 || strlen($email) < 1 || strlen($password) < 1) {
            return $this->render('login', ['signin_messages' => ['All fields required!']]);
        }

        if ($_POST["password"] !== $_POST["repeate_password"]) {
            return $this->render('login', ['signin_messages' => ['Passwords are not the same!']]);
        }

        $emailRegex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (!(preg_match($emailRegex, $email))) {
            return $this->render('login', ['signin_messages' => ['Wrong email!']]);
        }

        $passwordRegex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/';
        if (!(preg_match($passwordRegex, $_POST["password"]))) {
            return $this->render('login', ['signin_messages' => ['Password must be 8-16 characters and contain both numbers, letters and special characters!']]);
        }

        $tmpUserRepository = new UserRepository();
        $tmpUser = $tmpUserRepository->getUser($email);
        if ($tmpUser) {
            return $this->render('login', ['signin_messages' => ['This email address is already used']]);
        }

        if ($_POST["privacy_policy_checkbox"] !== "V") {
            return $this->render('login', ['signin_messages' => ['read and accept the data privacy!']]);
        }

        $user = new User($username, $email, $password);

        $userRepository = new UserRepository();
        $userRepository->addUser($user);

        $cookie_name = "user_id";
        $cookie_value = $this->encryptIt($userRepository->getId($user->getEmail()));
        setcookie($cookie_name, $cookie_value, 0, "/");
        //return $this->render('index');
        return $this->render('login', ['signin_messages' => ['Your account has been created!']]);
    }


}