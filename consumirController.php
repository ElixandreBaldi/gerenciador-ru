<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: login.php');
}
else if (! $admin = $loggedUser->isAdmin()) {
    header('Location: historico.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['novoRegistroConsumo'])) {

        $registroUsuarioConsumo = $_POST['novoRegistroConsumo'];
        $nivel = "";
        if ($_POST['novoRegistroConsumo'][0] == 3)
            $nivel = "registro_academico";
        else
            $nivel = "registro_universitario";

        $usuarioConsumo = Usuario::search()->whereEqual($nivel, $registroUsuarioConsumo)->run();
        $nomeUsuarioRecarga = $usuarioConsumo[0]['usuario'];
        $registro = $usuarioConsumo[0][$nivel];

        $flagSearch = true;
        $valorRefeicaoStr = '2,50';
        $valorRefeicao = 2.5;
        return require('Views/main.php');

    } else {
        $consumidor = $_POST['consumidor'];
        $nivel = $_POST['nivel'];
        $usuario = Usuario::search()->whereEqual($nivel,$consumidor)->run();
        $valor = -2.5;
        $transacao = Transacao::insert()->values(["valor"=>$valor,"usuario_id" => $usuario[0]['id']])->run();

        $success = true;
        $registrar = false;
        return require('Views/main.php');
    }
}

