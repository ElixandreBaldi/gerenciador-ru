<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_SESSION['usr'])){
        header('Location: login.php');
    } else {
        $loggedUser = Usuario::find($_SESSION['usr']);
        var_dump($loggedUser->getTransacoes());
        //return require('Views/main.php');
    }
}