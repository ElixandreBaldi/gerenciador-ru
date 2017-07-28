<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: login.php');
    die;
}

if (! $loggedUser->isAdmin()) {
    header('Location: historico.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    return require('Views/cadastro.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $type = isset($_POST['type']) ? $_POST['type'] : null;
        $acadReg = isset($_POST['acad-reg']) ? $_POST['acad-reg'] : null;
        $univReg = isset($_POST['univ-reg']) ? $_POST['univ-reg'] : null;

        $errors = [];
        $success = true;

        if ($type != 1 && $type != 2) {
            array_push($errors, 'É necessário informar o nível (acadêmico ou universitário).');
            $success = false;
        }

        if (empty($acadReg) && empty($univReg)) {
            array_push($errors, 'É necessário informar o registro acadêmico ou universiário.');
            $success = false;
        }

        if ($type == 1 && Usuario::academicRegisterExists($acadReg)) {
            array_push($errors, "Registro acadêmico {$acadReg} já existe.");
            $success = false;
        }

        if ($type == 2 && Usuario::universitaryRegisterExists($univReg)) {
            array_push($errors, "Registro universitário {$univReg} já existe.");
            $success = false;
        }

        if (Usuario::userExists($username)) {
            array_push($errors, "Usuário {$username} já existe.");
            $success = false;
        }

        if ($success) {
            if (Usuario::insert()
                    ->values([
                        'usuario' => $username,
                        'senha' => md5($password),
                        'nivel' => $type,
                        'registro_academico' => (! empty($acadReg)) ? $acadReg : null,
                        'registro_universitario' => (! empty($univReg)) ? $univReg : null,
                        'criado_em' => date('Y-m-d H:i:s'),
                        'atualizado_em' => date('Y-m-d H:i:s'),
                    ])
                    ->run() < 0) {
                $success = false;
            }
        }
        $_SESSION['register_errors'] = $errors;
        $_SESSION['register_success'] = $success;

        header('Location: cadastro.php');
    }
}