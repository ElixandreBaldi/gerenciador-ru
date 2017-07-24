<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: login.php');
}
else if (! $admin = $loggedUser->isAdmin()) {
    header('Location: historico.php');
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
        if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
            header('Location: login.php');
        } else {
            if ($loggedUser->getNivel() != 1) {
                header('Location: historico.php');
            } else {
                $errors = [];
                if ($type != 1 && $type != 2) {
                    array_push($errors, 'É necessário informar o nível (acadêmico ou universitário).');
                    $success = false;
                }
                else if (empty($acadReg) && empty($univReg)) {
                    array_push($errors, 'É necessário informar o registro acadêmico ou universiário.');
                    $success = false;
                }
                else if ($type == 1 && Usuario::academicRegisterExists($acadReg)) {
                    array_push($errors, "Registro acadêmico {$acadReg} já existe.");
                    $success = false;
                }
                else if ($type == 2 && Usuario::universitaryRegisterExists($univReg)){
                    array_push($errors, "Registro universitário {$univReg} já existe.");
                    $success = false;
                }
                else if (Usuario::userExists($username)) {
                    array_push($errors, "Usuário {$username} já existe.");
                    $success = false;
                }
                else if (Usuario::insert()
                        ->values([
                            'usuario' => $username,
                            'senha' => md5($password),
                            'nivel' => $type,
                            'registro_academico' => (! empty($acadReg)) ? $acadReg : null,
                            'registro_universitario' => (! empty($univReg)) ? $univReg : null,
                            'criado_em' => date('Y-m-d H:i:s'),
                            'atualizado_em' => date('Y-m-d H:i:s'),
                        ])
                        ->run() > 0
                ) {
                    $success = true;
                } else {
                    $success = false;
                }
                require_once('Views/cadastro.php');
            }
        }
    }
}