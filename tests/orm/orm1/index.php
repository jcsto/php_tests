<?php

echo 'Presentacion de este ORM<br><br>';

require_once 'MyDB.php';

$usuarios = MyDB::tabla('usuarios')->get();

foreach ($usuarios as $user)
{
    echo $user->nombre;
    echo $user->apellido;
    echo '<br>';
}
