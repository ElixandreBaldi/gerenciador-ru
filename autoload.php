<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once('Services/Connection.php');
require_once('Services/SearchBuilder.php');
require_once('Models/Model.php');
require_once('Models/Usuario.php');
$data = [];
session_start();