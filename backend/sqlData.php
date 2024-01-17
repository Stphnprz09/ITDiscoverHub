<?php
    include_once 'models.php';

    $servername = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "itdiscoverhub";

	$conn = new mysqli($servername, $dbuser, $dbpassword, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
    }    

    function getAllUsers() {
        global $conn;

        $sql = "SELECT `firstName`, `lastName`, `email`, `password` FROM user";
        $result = $conn->query($sql);

        $users = [];

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $user = new User($row['firstName'], $row['lastName'], $row['email'], $row['password']);
                $users[] = $user;
            }
        } 
        else {
            echo $conn->error;
        }

        return $users;
    }

    function insertNewUser($firstName, $lastName, $email, $password) {
        global $conn;
        
        $sql = "INSERT INTO user (`firstName`, `lastName`, `email`, `password`) VALUES ('" . $firstName . "', '" . $lastName . "', '" . $email . "', '" . $password . "')";
	    $result = $conn->query($sql);

        echo mysqli_error($conn);

        return $result;
    }
?>