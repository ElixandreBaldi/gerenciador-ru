<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: login.php');
    die;
}

if (! $admin = $loggedUser->isAdmin()) {
    header('Location: historico.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['novoRegistroConsumo'])) {

        $registroUsuarioConsumo = $_POST['novoRegistroConsumo'];

        if ($_POST['novoRegistroConsumo'][0] == 3) {
            $nivelStr = "registro_academico";
        } else {
            $nivelStr = "registro_universitario";
        }

        $usuarioConsumo = Usuario::search()
            ->whereEqual($nivelStr, $registroUsuarioConsumo)
            ->limit(1)
            ->run();

        if (count($usuarioConsumo) < 1) {
            $_SESSION['consume_success'] = false;
            $_SESSION['consume_error'] = [
                'Nenhum usuário encontrado.',
            ];
        } else {
            $_SESSION['to_consume'] = [
                'id' => $usuarioConsumo[0]['id'],
                'nome' => $usuarioConsumo[0]['usuario'],
                'nivel' => $usuarioConsumo[0]['nivel'],
                'nivel_str' => $nivelStr,
                'valor' => $usuarioConsumo[0]['nivel'] == 2 ? 2.5 : 6.0,
                'registro' => $usuarioConsumo[0][$nivelStr]
            ];
        }

        header('Location: main.php');
    } else {
        $consumidor = (isset ($_POST['consumidor'])) ? $_POST['consumidor'] : null;

        $usuario = Usuario::find($consumidor);

        if (!$usuario) {
            $_SESSION['consume_success'] = false;
            $_SESSION['consume_error'] = [
                'Nenhum usuário encontrado.',
            ];
        } else {
            $valor = $usuario->getNivel() == 2 ? -2.5 : -6.0;
            $transacao = Transacao::insert()
                ->values(["valor" => $valor,
                    "usuario_id" => $usuario->getId(),
                    "criado_em" => date('Y-m-d H:i:s')])
                ->run();
            $_SESSION['consume_success'] = true;
        }

        header('Location: main.php');
    }
}

