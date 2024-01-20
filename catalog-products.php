<?php
    include_once 'backend/models.php';
    include_once 'backend/rules.php';

    $searchIn = "smartphones";
    $model = $_GET['model'];

    $foundItem = null;

    if ($searchIn == "smartphones") {

        foreach ($smartphones as $smartphone) {
            if ($model === $smartphone->model) {
                $foundItem = $smartphone;
            }
        }
    }

    echo json_encode($foundItem);
?>