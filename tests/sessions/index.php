<?php

session_start();

$con = 0;
$val;

$_SESSION['A'] = 1;
$_SESSION['B'] = 2;

session_destroy();

$con = count($_SESSION);
echo $con . '<br>';
$entrada = array("a", "b", "c", "d", "e");

$salida = array_slice($entrada);
var_dump($salida);