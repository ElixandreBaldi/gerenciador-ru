<?php

require_once('../Models/Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $usr = Usuario::find(1);
    
    foreach ($usr as $row) {
        echo $row['usuario'];
    }
}

?>
