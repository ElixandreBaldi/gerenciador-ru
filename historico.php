<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    session_destroy();
    header('Location: login.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $transacoes = $loggedUser->getTransacoes();
    $saldo = 0.00;
    foreach ($transacoes as $t) {
        $saldo += $t->getValor();
    }
    $saldo = number_format($saldo, 2, ',', '.');

    return require('Views/historico.php');
}