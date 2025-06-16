<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // echo json_encode($_GET);
    echo $_GET['name'];
} else {
    http_response_code(404);
    echo 'Only GET requests are allowed';
}
