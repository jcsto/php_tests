<?php
/*
convierte un string en un array

str_split(string, split_length)

string
    El string de entrada.

split_length
    Longitud máxima del fragmento.


*/

$str = "Hello Friend";

$arr1 = str_split($str);
$arr2 = str_split($str, 3);

print_r($arr1);
print_r($arr2);