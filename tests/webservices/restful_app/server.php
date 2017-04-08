<?php

// process client request (VIA URL)
header("Content-Type:application/json");

if ($_SERVER['REQUEST_URI'])
{
    // convertir la cadena pasada por le URI en un array quitando los slashes "/"
    $name = explode('/', $_SERVER['REQUEST_URI']);
    // Si el índice dado por offset no es negativo, la secuencia empezará en esa posición del array. 
    // Si el offset es negativo, la secuencia empezará en esa posición empezando por el final del array.
    // retornara tantos elementos como se le especifique en el length, si no se le especifica, tomara el ofset como comienzo
    $name = array_slice($name, -1);
    
    $name = $name[0];
    echo json_encode($name);
}
