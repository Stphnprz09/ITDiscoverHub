<?php
    // this PHP file is used to fetch a particular catalog product (ex. Samsung Galaxy S23 Ultra)

    include_once 'rules.php';

    // gets the parameters from the URL
    $searchIn = "smartphones";  // determines what category to search into (either smartphone, tablets, or laptops)
    $model = $_GET['model'];    // determines what to search from the category

    $foundItem = null;  // will contain the found item, which will be echoed later as JSON

    // if $searchIn is equal to "smartphones", finds the item in $smartphones variable from rules.php that contains all smartphones data
    if ($searchIn == "smartphones") {
        foreach ($smartphones as $smartphone) {
            if ($model === $smartphone->model) {
                $foundItem = $smartphone;
            }
        }
    }

    echo json_encode($foundItem);
?>