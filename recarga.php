<?php

include_once('autoload.php');

if (! isset($_SESSION['usr']) || ! $loggedUser = Usuario::find($_SESSION['usr'])) {
    header('Location: login.php');
}
else if (! $admin = $loggedUser->isAdmin()) {
    header('Location: historico.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['quantidade-carga'])) {

        $nivel = $_POST['nivel'];
        $registro = $_POST['registro'];
        $valor = $_POST['quantidade-carga'];

        $usuario = Usuario::search()->whereEqual($nivel,$registro)->run();
        $transacao = Transacao::insert()->values(["valor"=>$valor,"usuario_id" => $usuario[0]['id']])->run();

        $success = true;
        $registrar = false;
        return require('Views/inserir.php');
     } else {
        $nivel = "";
        if ($_POST['registro'][0] == 3)
            $nivel = "registro_academico";
        else
            $nivel = "registro_universitario";

        $usuarioRecarga = Usuario::search()->whereEqual($nivel, $_POST['registro'])->run();
        $nomeUsuarioRecarga = $usuarioRecarga[0]['usuario'];
        $registro = $usuarioRecarga[0][$nivel];

        $registrar = true;
        return require('Views/inserir.php');
    }
}

