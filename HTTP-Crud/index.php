<?php

require_once __DIR__ . '/autoload.php';

use app\business\Get;
use app\business\Add;
use app\business\Update;
use app\business\Delete;

use app\data\Repository;
use app\validators\Validator;

use app\exceptions\DataException;
use app\exceptions\ValidationException;

$repository = new Repository();
$validator = new Validator();

try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $get = new Get($repository);
            $data = $get->get();
            echo json_encode($data);
            break;
        case 'POST':
            $body = json_decode(file_get_contents('php://input'), true);
            $add = new Add($validator, $repository);
            $add->add($body);
            break;
        case 'PUT':
            $body = json_decode(file_get_contents('php://input'), true);
            $put = new Update($validator, $repository);
            $put->update($body);
            break;
        case 'DELETE':
            $id = $_GET['id'];
            $delete = new Delete($repository);
            $delete->delete($id);
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
} catch (TypeError $e) {
    http_response_code(400);
    echo json_encode(['TypeError' => $e->getMessage()]);
}
