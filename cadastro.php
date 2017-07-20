<?php

include_once('autoload.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
        header('Location: login.php');
    } else {
        if ($loggedUser->getNivel() != 1) {
            header('Location: historico.php');
        } else {
            return require('Views/cadastro.php');
        }
    }
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