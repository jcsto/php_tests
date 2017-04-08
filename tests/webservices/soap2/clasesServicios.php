<?php

class Servicios
{
    public function informacionActualServer($variable)
    {
        $fecha = date("F j, Y, g:i:s a");
        $datos = $variable . ' ' . $fecha;
        
        return $datos;
    }
}