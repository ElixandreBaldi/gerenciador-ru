<?php

include_once('autoload.php');

session_destroy();
header('Location: login.php');