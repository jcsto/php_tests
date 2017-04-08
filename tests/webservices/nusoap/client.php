<?php
require 'lib/nusoap.php';

// CLIENT FILE

$client = new nusoap_client('http://localhost/php_apps/tests/webservices/nusoap/index.php?wsdl');

$book_name = 'xyz';
$price = $client->call('price', ['name' => $book_name]);
var_dump($price);

