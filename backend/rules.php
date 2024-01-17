<?php
    include_once 'models.php';
    include_once 'sqlData.php';

    $users = getAllUsers();

    function isEmailExists($email) {
        global $users;
        $isExists = false;

        foreach ($users as $user) {
            if ($user->email === $email) {
                $isExists = true;
                break;
            }
        }

        return $isExists;
    }

    function registerUser($firstName, $lastName, $email, $password) {
        $result = insertNewUser($firstName, $lastName, $email, $password);
        return $result;
    }

    function login($email, $password) {
        global $users;
        $success = false;

        foreach ($users as $user) {
            if ($user->email === $email && $password === $password) {
                $success = true;
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $user->firstName;
                $_SESSION['lastName'] = $user->lastName;
                header("Location: home.php");
                break;
            }
        }

        return $success;
    }
?>