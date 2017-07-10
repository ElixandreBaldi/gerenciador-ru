<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['usr'])) {
        header('Location: main.php');
    } else {
        require('Views/login.php');
    }
}