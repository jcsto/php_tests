<?php

// chr — Devuelve un caracter específico

$str = "La cadena termina en un escape: ";
$str .= chr(27); /* añade un carácter de escape al final de  $str */

/* A menudo esto es más útil */

$str = sprintf("TLa cadena termina en un escape: %c", 27);
?>
