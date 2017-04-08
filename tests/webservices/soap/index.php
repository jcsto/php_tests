<?php
ini_set('display_errors', true);
error_reporting(E_ALL);


class Server
{
    public function __construct()
    {
        $this->con = (is_null($this->con)) ? self::connect() : $this->con;
    }
    
    public static function authenticate($header_params)
    {
        if ($header_params->username == 'Julio' && $header_params->password == 'root')
            return true;
        else
            throw new SOAPFault('Wrong user/pass combination', 401);
    }
    
    public static function connect()
    {
        $con = new mysqli('localhost', 'root', '', 'test');
        return $con;
    }
    
    public function getStudentName($id_array)
    {
        $sql = 'SELECT name FROM students WHERE id = ' . $id_array['id'];
        $result = $this->con->query($sql);
        /* array asociativo */
        $row = $result->fetch_array(MYSQLI_ASSOC);
        return $row['name'];
    }
    
    
}

$params = ['uri' => 'http://localhost/php_apps/tests/webservices/soap/index.php'];
/*
 * Creacion de objectos en modo 
 * - WSDL (pasar URI del fichero WSDL) o 
 * - no-WSDL (pasar NULL y define la opcion URI a ser el destino del NAMESPACE para el servidor)
 * 
 */
$server = new SoapServer(NULL, $params);

// Define la clase que controla las peticiones SOAP
$server->setClass('Server');

// controll and process the SOAP request, call the necessary functions and sends an answer
// si se omite se asume que la peticion esta en los datos POST de la peticion HTTP
$server->handle();

