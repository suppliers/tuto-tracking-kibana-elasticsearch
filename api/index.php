<?php
if (isset($_SERVER['HTTP_REFERER'], $_GET['data'])) {

    // Initialize cURL
    $cURL = curl_init();

    $obj_data = json_decode($_GET['data']);
    $obj_data->created = date('r');
    $data = json_encode($obj_data);

    //file_put_contents('log/data', $data . PHP_EOL, FILE_APPEND);

    // Configure cURL options
    $options = array(
        CURLOPT_URL => 'http://127.0.0.1:9200/tracker/hit/' . uniqid('', true),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data
    );

    // Set cURL options
    curl_setopt_array($cURL, $options);

    // Get the results
    $result = curl_exec($cURL);

    //file_put_contents('log/api', $result . PHP_EOL, FILE_APPEND);

    // Close resource
    curl_close($cURL);

    echo $result;
}
