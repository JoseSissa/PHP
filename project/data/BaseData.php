<?php

namespace app\data;

use PDO;

abstract class BaseData
{
    protected $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        $this->pdo = new PDO($dsn, DB_USER, DB_PASS);
        // The next line helps us to handle errors
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
