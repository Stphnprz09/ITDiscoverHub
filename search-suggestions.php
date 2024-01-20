<?php
    include_once 'backend/models.php';
    include_once 'backend/rules.php';

    $searchIn = $_GET['searchIn'];
    $searchFor = $_GET['searchFor'];
    $searchWords = str_word_count($searchFor, 1);
    $searchSuggestions = [];

    if ($searchIn == "smartphones") {
        foreach ($smartphones as $smartphone) {
            $containsAllWords = true;
    
            foreach ($searchWords as $word) {
                if (stripos($smartphone->model, $word) === false) {
                    $containsAllWords = false;
                    break;
                }
            }
    
            if ($containsAllWords === true) {
                $searchSuggestions[] = $smartphone->model;
            }
        }
    }

    echo json_encode($searchSuggestions);
?>
