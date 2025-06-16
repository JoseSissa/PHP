<?php
header('Content-Type: application/json');

$dataDB = [
    ["id" => 1, "name" => "Jose", "age" => 25],
    ["id" => 2, "name" => "Maria", "age" => 30],
    ["id" => 3, "name" => "Pedro", "age" => 35],
];

function getData(int $id, array $arr): int
{
    foreach ($arr as $key => $value) {
        if ($value['id'] == $id) {
            return $value['id'];
        }
    }
    return -1;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    // Transform the data to JSON format in text
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    extract((array)$data);

    if ($data != null && isset($id) && isset($name) && isset($age)) {
        $index = getData($id, $dataDB);
        if ($index >= 0) {
            $dataDB[$index]['name'] = $name;

            http_response_code(200);
            echo json_encode([
                'message' => 'Data updated',
                'data' => json_encode($dataDB)
            ]);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Data not found']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid data']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Only PUT requests are allowed']);
}
