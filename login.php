<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usr = Usuario::findLogin($username, $password);

    if (is_null($usr)) {
        $data['error'] = 'Usuário ou senha inválidos.';
        $data['old_username'] = $username;
        require('Views/login.php');
    } else {
        $_SESSION['usr'] = $usr->getId();
        require('Views/main.php');
    }
}

else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require('Views/login.php');
}

?>
