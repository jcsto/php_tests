<?php

//crear clase para los parametros necesarios.

class GetWeather {
    public $CityName;
    public $CountryName;
    
    public function __construct($cityName, $countryName){
        $this->CityName = $cityName;
        $this->CountryName = $countryName;
    }
}

//inicio cliente SOAP
$cliente = new SoapClient("http://www.webservicex.net/globalweather.asmx?wsdl");

//hago la llamada pasando por parámetro un objeto como el que se define arriba
$respuesta = $cliente->GetWeather( new GetWeather('Barcelona','Spain') );

var_dump($respuesta); // se imprime por pantalla la respuesta que será un Array asociativo con la estructura definida como GetWeatherResponse