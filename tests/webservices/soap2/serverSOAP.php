<?php
require 'clasesServicios.php';

// limpiar la cache para que cargue el WSDL con cada ejecucion
ini_set('soap.wsdl_cache_enable', '0');

$directorioWSDL = 'directorioWsdl/miWsdl.wsdl';

$parametros = [
    'uri' => 'http://localhost/php_apps/tests/webservices/soap2/',
    'soap_version' => SOAP_1_1,
];

$objetoServer = new SoapServer(null, $parametros);
$objetoServer->setClass('Servicios');
$objetoServer->handle();

