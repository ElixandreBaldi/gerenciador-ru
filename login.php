<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

require_once('Models/Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usr = Usuario::findLogin($username, $password);

    if (is_null($usr)) {
        $data = [
            'error' => 'ERROOO',
        ];
    }

    require_once('Views/login.php');
}

?>
