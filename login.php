<?php

include_once('autoload.php');

if (isset($_SESSION['usr']) && $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: main.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $loggedUser = Usuario::findLogin($username, $password);

    if (is_null($loggedUser)) {
        $_SESSION['login_success'] = false;
        $_SESSION['login_error'] = 'Usuário ou senha inválidos.';
        $_SESSION['old_username'] = $username;

        header('Location: login.php');
        die;
    } else {
        $_SESSION['usr'] = $loggedUser->getId();
        if ($loggedUser->isAdmin()) {
            header('Location: main.php');
            die;
        } else {
            header('Location: historico.php');
            die;
        }
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        return require('Views/login.php');
    }
}

?>
