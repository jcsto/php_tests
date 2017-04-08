<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Introduce tu nombre</label><br>
    <input tabindex="1" type="text" name="nombre" >
    <button type="submit" name="submit">Enviar</button>
</form>
<?php

/**
 * RESTful APP
 * JSON
 */

if (isset($_POST['submit']))
{
    $val = $_POST['nombre'];
    
    // crear un recurso cURL
    $ch = curl_init();
    
    // crear las opciones de cURL
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER  => 1,
        CURLOPT_URL             => 'http://localhost/php_apps/tests/webservices/restful_app/' . $val,
        //CURLOPT_POST            => 1,
        //CURLOPT_POSTFIELDS      => http_build_query(['nombre' => $val])
    ]);
    
    // verificar por erores
    if (curl_exec($ch) !== false)
    {
        // ejecutar el servicio y asignar la respuesta
        $response = curl_exec($ch);
    }
    else
    {
        echo 'Error cURL: ' . curl_error($ch);
    }
    
    // cerrar recurso
    curl_close($ch);
    
    // decodificar la respuesta en formato JSON
    $result = json_decode($response);
    echo 'Hello ' . $result . '.';
    
}
