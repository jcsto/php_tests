<?php

$cliente = new SoapClient("http://www.webservicex.net/globalweather.asmx?wsdl");

//obtener las funciones a las que puedo llamar
$funciones = $cliente->__getFunctions();

echo "<h2>Funciones del servicio</h2>";
foreach ($funciones as $funcion) {
	echo $funcion . "<br />";
}

//obtener los tipos de datos involucrados
echo "<h2>Tipos en el servicio</h2>";
$tipos = $cliente->__getTypes();

foreach ($tipos as $tipo) {
	echo $tipo . "<br />";
}

//veremos algo así en la pantalla del navegador:
/*

Funciones del servicio

GetWeatherResponse GetWeather(GetWeather $parameters)
GetCitiesByCountryResponse GetCitiesByCountry(GetCitiesByCountry $parameters)
GetWeatherResponse GetWeather(GetWeather $parameters)
GetCitiesByCountryResponse GetCitiesByCountry(GetCitiesByCountry $parameters)

Tipos en el servicio

struct GetWeather { string CityName; string CountryName; }
struct GetWeatherResponse { string GetWeatherResult; }
struct GetCitiesByCountry { string CountryName; }
struct GetCitiesByCountryResponse { string GetCitiesByCountryResult; }

*/