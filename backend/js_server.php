<?php
    include_once 'models.php';
    include_once 'rules.php';

    $users = getAllUsers();

    if ($users) {
        $jsonData = json_encode($users);
    }

    print $jsonData;

?>
