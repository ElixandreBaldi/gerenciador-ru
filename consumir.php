<?php

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: login.php');
}
else if (! $admin = $loggedUser->isAdmin()) {
    header('Location: historico.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $register = isset($_POST['code']) ? $_POST['code'] : null;
    $errors = [];
    $registerUser = Usuario::findByRegister($register);
    if (!$registerUser) {
        array_push($errors, "Nenhum usuário encontrado com o registro {$register}.");
        $success = false;
    }

    var_dump($register);
}