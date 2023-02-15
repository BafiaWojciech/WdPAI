<?php

namespace repository;

use models\User;
use PDO;
use Repository;

require_once 'Repository.php';

class UserRepository extends Repository {

    public function __construct() {
        parent::__constructor();
    }

    public function addUser(User $user) {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.user (username, email, password)
            VALUES (?,?,?)
            ');
        $stmt->execute([$user->getUsername(), $user->getEmail(), $user->getPassword()]);
    }


    public function getUser(string $username_email) {
        $user = null;
        $emailRegex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (preg_match($emailRegex, $username_email)) {
            $stmt = $this->database->connect()->prepare('SELECT * FROM public.user WHERE email = :email');
            $stmt->bindParam(':email', $username_email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $stmt = $this->database->connect()->prepare('SELECT * FROM public.user WHERE username = :username');
            $stmt->bindParam(':username', $username_email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        if (!$user) {
            return null;
        }

        return new User(
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    /*

    public function getUserById(string $id_user) {
        $stmt = $this->database->connect()->prepare('SELECT * FROM public.users WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    public function getEmail(string $id_user) {
        $stmt = $this->database->connect()->prepare('SELECT email FROM public.users WHERE id_user = :id_user');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();
        $email = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$email) {
            return null;
        }
        return $email['email'];
    }
    */
}