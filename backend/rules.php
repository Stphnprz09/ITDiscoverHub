<?php
    // this contains the business rules or logics
    // aside from the PHP servers for fetch requests, the frontend uses this
    // both the servers and frontend uses this to get the data and logic they need
    // this is the only PHP file that uses db_service.php, which is a PHP file that directly connects and fetches data from the database

    include_once 'db_service.php';  // imports db_service.php

    $users = getUsers();    // gets the users data using getUsers() function from db_service.php
    $smartphones = getSmartphones();    // gets the smartphones data using getSmartphones() function from db_service.php


    // this checks if the email from the parameter already exists
    // this is used when a user wants to register
    // this returns a boolean
    function isEmailExists($email) {
        global $users;  // accesses the global variable $users
        $isExists = false;

        foreach ($users as $user) {
            if ($user->email === $email) {
                $isExists = true;
                break;
            }
        }

        return $isExists;
    }

    // this is used in registering a new user
    // createNewUser() function from the db_service.php is used to add a new user data to the database
    function registerUser($firstName, $lastName, $email, $password) {
        $result = createNewUser($firstName, $lastName, $email, $password);

        return $result; // a boolean whether the data is successfully inserted to the table
    }

    // this is used in login
    // it checks if the user exists from the database, using the email and password parameters
    function isUserExists($email, $password) {
        global $users;  // accesses the global variable $users
        $success = false;   // boolean that will be returned later, whether the email and password are valid credentials, that is, found in the $users data

        foreach ($users as $user) {
            if ($user->email === $email && $user->password === $password) {
                $success = true;
                break;
            }
        }

        return $success; 
    }

    // gets a smartphone data by model parameter
    function getSmartphoneByModel($model) {
        global $smartphones;    // accesses the global variable $smartphones
        $foundSmartphone = null;    // will contain the smartphone with model that matches the $model parameter

        foreach ($smartphones as $smartphone) {
            if ($smartphone->model == $model) {
                $foundSmartphone = $smartphone;
                break;
            }
        }

        return $foundSmartphone;
    }
?>