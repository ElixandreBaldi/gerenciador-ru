<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    $usr = Usuario::findLogin($username, $password);
    if (is_null($usr)) {
        $data['error'] = 'Usuário ou senha inválidos.';
        $data['old_username'] = $username;
        return require('Views/login.php');
    } else {
        $_SESSION['usr'] = $usr->getId();
        $nivel = $usr->getNivel();
        if ($nivel == 1){
            header('Location: main.php');
        }
        else {
            header('Location: historico.php');
        }
    }
}

else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_SESSION['usr'])){
        header('Location: main.php');
    } else {
        return require('Views/login.php');
    }
}

?>
