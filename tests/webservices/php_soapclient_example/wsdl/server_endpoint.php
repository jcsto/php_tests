<?php

require_once('../simple_soap_server_class.php');

$server = new SoapServer('http://172.17.10.28/php_soapclient_example/wsdl/simple_service_definition.wsdl');
$server->setClass('SimpleSoapServer');
$server->handle();
