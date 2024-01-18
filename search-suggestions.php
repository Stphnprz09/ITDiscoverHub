<?php
    include_once 'backend/models.php';
    include_once 'backend/rules.php';

    $userInput = $_GET['query']; // Assumes you're using GET method
    $suggestions = [];

    foreach ($smartphones as $smartphone) {
        if (stripos($smartphone->model, $userInput) !== false) {
            $suggestions[] = $smartphone->model;
        }
    }

    echo json_encode($suggestions);
?>
