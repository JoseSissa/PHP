<?php

require_once __DIR__ . '/validators/autoload.php';

use app\exceptions\DataException;
use app\exceptions\ValidationException;

try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            break;
        case 'POST':
            break;
        case 'PUT':
            break;
        case 'DELETE':
            break;
        default:
            http_response_code(405);
            echo json_encode(['error' => 'Only GET, POST, PUT and DELETE requests are allowed']);
    }
} catch (DataException $e) {
    http_response_code(404);
    echo json_encode(['error' => $e->getMessage()]);
} catch (ValidationException $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
} catch (\Exception $e) {
    // \Exception is to use Exception class, we can put use Exception; instead, result will be the same
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
