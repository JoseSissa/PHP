<?php

session_start();


if (isset($_SESSION['name'])) {
    echo 'Name: ' . $_SESSION['name'];
}
$_SESSION['name'] = 'Jose';
