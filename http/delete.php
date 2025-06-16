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
            return $key;
        }
    }
    return -1;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    extract($_GET);

    if (isset($id)) {
        $index = getData($id, $dataDB);
        if ($index >= 0) {
            unset($dataDB[$index]);
            $arr = array_values($dataDB);

            http_response_code(200);
            echo json_encode([
                'message' => 'Data deleted',
                'data' => json_encode($arr)
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
    echo json_encode(['error' => 'Only DELETE requests are allowed']);
}
