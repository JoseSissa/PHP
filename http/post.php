<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo file_get_contents('php://input');
    $json = file_get_contents('php://input');
    // Data will be an objetc, if we want that data will be an array, we need to add true as second parameter.
    $data = json_decode($json);

    // $name = $data->name;
    // $age = $data->age;

    extract((array)$data);
    echo $name;
    echo $age;

    print_r($data);
    http_response_code(201);
    echo json_encode(['success' => 'POST request received']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Only POST requests are allowed']);
}
