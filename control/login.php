<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors','On');
require_once('../Models/Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    Usuario::search()->whereEqual('canabarro','canabasso')->whereDifferent('dif',1)->whereGreaterOrEqualThan('lala', 3)->limit(1)->run();

    //Usuario::search()->whereEqual('canabarro','canabasso')->whereDifferent('dif',1)->whereGreaterOrEqualThan('lala'3)->limit(1)->run();    
    /*foreach ($usr as $row) {
        echo $row['usuario'];
    }*/
}

?>
