<?php
function foo()
{
    $numargs = func_num_args();
    echo "Numero de argumentos: $numargs<br />\n";
    if ($numargs >= 2) {
        echo "El segundo argumento es: " . func_get_arg(1) . "<br />\n";
    }
    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {
        echo "El argumento $i es: " . $arg_list[$i] . "<br />\n";
    }
}

echo 'Function: func_get_args()<br>';

foo(1, 2, 3);
?>
