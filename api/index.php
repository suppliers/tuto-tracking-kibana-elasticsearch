<?php
function json2curl($data) {
    $json_data = json_decode($data);
    $response = '';
    foreach ($data as $key => $value) {
        $response .= $key . '=' . $value;
    }
    return $response;
}

if (isset($_SERVER['HTTP_REFERER'], $_GET['data'])) {
    // Initialize cURL
    $cURL = curl_init();

    // Configure cURL options
    $options = array(
        CURLOPT_URL => 'http://127.0.0.1:9200/kibana-website-tracker/tracl/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json2curl($data)
    );

    // Set cURL options
    curl_setopt_array($cURL, $options);

    // Get the results
    $result = curl_exec($cURL);

    // Close resource
    curl_close($cURL);

    echo $result;
}
