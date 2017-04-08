<?php
require 'namespaces2.php';
/*
 * PHP 5+ namespaces
 */
/*
//use MiNamespace; // solo llamar al namespace
use MiNamespace\Adios; // llamar al namespace especificando la clase Adios
use MiNamespace\foo as AliasFunc; // llamar al namespace especificando la funcion foo() y agregandole un alias
use MiNamespace\HELLO; // invocando al namespace y a la constante

$ob = new \Hola;
$ob = new Adios;

echo "<br><h2>Functions:</h2>";
AliasFunc();

echo "<br><h2>Constants:</h2>";
echo HELLO;
*/

/*
 * PHP 7+ namespaces
 */

use MiNamespace\{Hola, Adios as al};

$ob = new Hola;
$ob = new al;
echo "<br><h2>Functions:</h2>";
MiNamespace\foo();

echo "<br><h2>Constants:</h2>";
echo MiNamespace\HELLO;