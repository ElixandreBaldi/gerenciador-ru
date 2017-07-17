<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_SESSION['usr'])){
        header('Location: login.php');
    } else {
        $loggedUser = Usuario::find($_SESSION['usr']);
        $transactions = $loggedUser->getTransacoes();
        $admin = $loggedUser->isAdmin();   
        $nomeUsuario = $loggedUser->getUsuario();
        $saldo = 0.00;
        foreach ($transactions as $t) {
        	$saldo += $t->getValor();
        }
        $saldo = number_format($saldo,2,',','.');

        return require('Views/historico.php');
    }
}