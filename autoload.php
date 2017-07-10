<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require_once('Models/Usuario.php');
require_once('Services/Connection.php');
require_once('Services/SearchBuilder.php');
$data = [];
session_start();