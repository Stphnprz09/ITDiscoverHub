<?php
    // this contains the business rules or logics
    // aside from the PHP servers for fetch requests, the frontend uses this
    // both the servers and frontend uses this to get the data and logic they need
    // this is the only PHP file that uses db_service.php, which is a PHP file that directly connects and fetches data from the database

    include_once 'db_server.php';  // imports db_service.php

    $users = getUsers();    // gets all the users data using getUsers() function from db_service.php
    $smartphones = getSmartphones();    // gets all the smartphones data using getSmartphones() function from db_service.php
    $laptops = getLaptops();    // gets all the laptops data using getLaptops() function from db_service.php
    $tablets = getTablets();    // gets all the tablets data using getLaptops() function from db_service.php

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
    // it returns a user data (User object) based on the email and password parameters
    function getUser($email, $password) {
        global $users;  // accesses the global variable $users
        $foundUser = null;   // will contain the user that will be returned

        foreach ($users as $user) {
            if ($user->email === $email && $user->password === $password) {
                $foundUser = $user;
                break;
            }
        }

        return $foundUser; 
    }

    // gets a smartphone data by model parameter
    // returns a Smartphone object
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

    // gets a laptop data by model parameter
    // returns a Laptop object
    function getLaptopByModel($model) {
        global $laptops;    // accesses the global variable $laptops
        $foundLaptop = null;    // will contain the laptop with model that matches the $model parameter

        foreach ($laptops as $laptop) {
            if ($laptop->model == $model) {
                $foundLaptop = $laptop;
                break;
            }
        }

        return $foundLaptop;
    }

    // gets a tablet data by model parameter
    // returns a Tablet object
    function getTabletByModel($model) {
        global $tablets;    // accesses the global variable $tablets
        $foundTablet = null;    // will contain the tablet with model that matches the $model parameter

        foreach ($tablets as $tablet) {
            if ($tablet->model == $model) {
                $foundTablet = $tablet;
                break;
            }
        }

        return $foundTablet;
    }
?>