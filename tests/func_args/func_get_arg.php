<?php
function foo()
{
     $numargs = func_num_args();
     echo "Numero de argumentos: $numargs<br />\n";
     if ($numargs >= 2) {
         echo "El segundo argumento es: " . func_get_arg(1) . "<br />\n";
     }
}
echo 'Functions: func_num_args() , func_get_arg(int)<br>';
foo (1, 2, 3);
?>
