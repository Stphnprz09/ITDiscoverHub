<?php
    include_once 'rules.php';

    // gets the parameters from the URL
    $searchIn = $_GET['searchIn'];  // determines what category to search into (either smartphone, tablets, or laptops)
    $searchFor = $_GET['searchFor'];    // determines what to search from the category

    $searchWords = str_word_count($searchFor, 1);   // gets every word from the $searchFor, and places them in an array
    $searchSuggestions = [];    // initialize search suggestions array that will be echoed later as JSON

    if ($searchIn == "smartphones") {
        foreach ($smartphones as $smartphone) {
            $containsAllWords = true;   // this is so that only models that contains all the words from the $searchFor will be echoed as JSON
    
            foreach ($searchWords as $word) {
                // if at least one word from $searchFor is not in a model of a $searchIn item,
                // the item will not be included in the $searchSuggestions array
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
