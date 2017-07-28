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
    return require('Views/inserir.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['quantidade-carga'])) {

            $nivel = $_POST['nivel'];
            $registro = $_POST['registro'];
            $valor = $_POST['quantidade-carga'];

            $usuario = Usuario::search()
                ->whereEqual($nivel, $registro)
                ->limit(1)
                ->run();

            if (count($usuario) < 1) {
                $_SESSION['insert_success'] = false;
                $_SESSION['insert_error'] = ['Usuário não encontrado.'];
                $_SESSION['insert_success'] = false;
            } else {
                $transacao = Transacao::insert()
                    ->values([
                        "valor" => $valor,
                        "usuario_id" => $usuario[0]['id'],
                        "criado_em" => date('Y-m-d H:i:s'),
                    ])
                    ->run();

                $_SESSION['insert_success'] = true;
            }
            header('Location: recarga.php');
        } else {
            if ($_POST['registro'][0] == 3) {
                $nivel = "registro_academico";
            } else {
                $nivel = "registro_universitario";
            }

            $usuario = Usuario::search()
                ->whereEqual($nivel, $_POST['registro'])
                ->run();

            if (count($usuario) < 1) {
                $_SESSION['insert_success'] = false;
                $_SESSION['insert_error'] = ['Usuário não encontrado.'];
            } else {
                $_SESSION['to_insert'] = [
                    'registro' => $usuario[0][$nivel],
                    'usuario' => $usuario[0]['usuario'],
                    'nivel' => $nivel,
                ];
            }

            header('Location: recarga.php');
        }
    }
}

