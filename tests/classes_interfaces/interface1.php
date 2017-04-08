<?php

interface MyInterface
{
    const CONSTANTE = 'hola';
    
    public function foo();
    public function argum(string $as);
    public function argum2(Clase $c);
}

class Clase implements MyInterface
{
    public function foo()
    {
        return 'foo';
    }
    // optional param
    public function argum(string $as, $opcional = '')
    {
        return $as . ' ' . $opcional;
    }
    public function argum2(Clase $c)
    {
        return $c;
    }
}

$ob = new Clase;
echo $ob->foo() . '<br>';
echo $ob->argum(3) . '<br>';
var_dump($ob->argum2(new Clase));