<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    session_destroy();
    header('Location: login.php');
    die;
}

if (! $loggedUser->isAdmin()) {
    header('Location: historico.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    return require('Views/main.php');
}

?>
