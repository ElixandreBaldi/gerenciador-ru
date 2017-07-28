<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    session_destroy();
    header('Location: login.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($loggedUser->isAdmin()) {
        header('Location: main.php');
    } else {
        header('Location: historico.php');
    }
}