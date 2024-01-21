<?php
    include_once 'backend/models.php';
    include_once 'backend/rules.php';

    // gets the parameters from the URL
    $searchIn = $_GET['searchIn'];
    $searchFor = $_GET['searchFor'];

    // gets every word from the $search for, and places in an array
    $searchWords = str_word_count($searchFor, 1);
    $searchSuggestions = [];    // initialize search suggestions array that will be echoed later as JSON

    if ($searchIn == "smartphones") {
        foreach ($smartphones as $smartphone) {
            $containsAllWords = true;   // this is so that only models that contains all the words from the $searchFor will be echoed as JSON
    
            foreach ($searchWords as $word) {
                if (stripos($smartphone->model, $word) === false) {    // if at least one word from $searchFor is not in a model of a $searchIn item,
                    $containsAllWords = false;                          // the item will not be included in the echoed JSON
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
