<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

class Client
{
    public function __construct()
    {
        $params = [
            'location'  => 'http://localhost/php_apps/tests/webservices/soap/index.php',
            'uri'       => 'urn://localhost/php_apps/tests/webservices/soap/index.php',
            'trace'     => 1
        ];
        $this->instance = new SoapClient(NULL, $params);
        
        //set the header
        $auth_params = new stdClass();
        $auth_params->username = 'Julio';
        $auth_params->password = 'root';
        
        $header_params = new SoapVar($auth_params, SOAP_ENC_OBJECT);
        $header = new SoapHeader('codev', 'authenticate', $header_params, false);
        $this->instance->__setSoapHeaders([$header]);
    }
    
    public function getName($id_array)
    {
        /*
         *  function_name
            Nombre de la función SOAP a llamar.

            arguments
            Un array de argumentos a pasar a la función. Puede ser bien un array ordenado o asociativo. Tenga en cuenta que la mayoría de los servidores SOAP requieren que los nombres de parámetros sean proveídos, en cuyo caso ha de ser un array asociativo.

            options
            - Un array asociativo de opciones a pasar al cliente.
            - La opción location es la URL del servicio Web remoto.
            - La opción uri es el destino del espacio de nombres del servicio SOAP.
            - La opción soapaction es la acción a llamar.

            input_headers
            Un array de encabezados a ser enviados con la petición SOAP.

            output_headers
            Si se proporciona, este array se llenará con los encabezados de la respuesta SOAP.
        *
        */
        return $this->instance->__soapCall('getStudentName', $id_array);
    }
    
}

$client = new Client;