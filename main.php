<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
        header('Location: login.php');
    } else {
        if ($loggedUser->getNivel() != 1) {
            header('Location: historico.php');
        } else {
        	$admin = $loggedUser->isAdmin(); 
            return require('Views/main.php');
        }
    }
}

?>
