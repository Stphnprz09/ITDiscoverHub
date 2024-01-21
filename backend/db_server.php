<?php
    // this PHP file is the one that directly connects and fetches data from the database

    include_once 'models.php';  // imports models.php

    $servername = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "itdiscoverhub";

    // database connection
	$conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
    }    

    // gets all the users from the user table 
    function getUsers() {
        global $conn;

        $sql = "SELECT `firstName`, `lastName`, `email`, `password` FROM user";
        $result = $conn->query($sql);

        $users = [];    // will be array of User class objects

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // creates User object from the result, then adds to the $users array that will be returned
                $user = new User($row['firstName'], $row['lastName'], $row['email'], $row['password']);
                $users[] = $user;
            }
        } 
        else {
            echo $conn->error;
        }

        return $users;
    }

    // inserts new user data to the database
    // this is used in user registration
    function createNewUser($firstName, $lastName, $email, $password) {
        global $conn;
        
        $sql = "INSERT INTO user (`firstName`, `lastName`, `email`, `password`) VALUES ('" . $firstName . "', '" . $lastName . "', '" . $email . "', '" . $password . "')";
	    $result = $conn->query($sql);

        echo mysqli_error($conn);

        return $result;     // a boolean whether the data is successfully inserted to the table
    }

    // gets all the smartphones data from the database
    function getSmartphones() {
        global $conn;

        $sql = "SELECT `brand`, `model`, `screen`, `os`, `chipset`, `GPU`, `RAM`, `storage`, `price` FROM tblsmartphone";
        $result = $conn->query($sql);

        $smartphones = [];  // will be array of Smartphone class objects

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // creates Smartphone object from the result, then adds to the $smartphones array that will be returned
                $smartphone = new Smartphone($row['brand'], $row['model'], $row['screen'], $row['os'], $row['chipset'], $row['GPU'], $row['RAM'], $row['storage'], $row['price']);
                $smartphones[] = $smartphone;
            }
        } 
        else {
            echo $conn->error;
        }

        return $smartphones;
    }
?>