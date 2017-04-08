<?php
/*
 * NuSoap web services
 */
 // SERVICE FILE
 
require 'lib/nusoap.php';
require 'functions.php';

$server = new nusoap_server();
$server->configureWSDL('demo', 'urn:php_apps/tests/webservices/nusoap');
$server->register(
	'price', // name of function
	['name' => 'xsd:string'], // inputs
	['return' => 'xsd:intger'] // outputs
);
/*
 * OBSOLETO A PARTIR DE PHP 5.3, REMOVIDO EN PHP 7+
 
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
*/

$post = file_get_contents('php://input');
$server->service($post);

