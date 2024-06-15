<?php

// Function to fetch data from Wikipedia
function fetchDataFromWikipedia($searchTerm) {
    $url = 'https://en.wikipedia.org/w/api.php?action=query&format=json&prop=extracts&exintro&explaintext&titles=' . urlencode($searchTerm);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo "Error fetching data from Wikipedia.";
        return false;
    }

    $data = json_decode($response, true);

    // Extract the page content from the response
    $pages = $data['query']['pages'];
    $pageId = key($pages);
    
    // Check if extract exists
    if(isset($pages[$pageId]['extract'])){
        return $pages[$pageId]['extract'];
    } else {
        return "Sorry, no information found for '$searchTerm' on Wikipedia.";
    }
}

// Get user input
$userInput = isset($_POST['message']) ? $_POST['message'] : '';

if (!empty($userInput)) {
    // Example usage: Fetch data for the provided topic
    $wikipediaData = fetchDataFromWikipedia($userInput);

    echo $wikipediaData;
}

?>
