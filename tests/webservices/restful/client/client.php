<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label>Book Name</label>
<input type="text" name="name" />
<input type="submit" name="submit" value="Search"/>
</form>

<?php

if (isset($_POST['submit']) && !empty($_POST['name']))
{
	$name = $_POST['name'];
	
	// resource address
	$url = 'http://localhost/php_apps/tests/webservices/restful/' . $name;
    // auth key
    $apiKey = '32Xhsdf7asd5'; // should match with Server key
    $headers = array(
         'Authorization: '.$apiKey
    );
	
	// send GET | PUT | POST request to resource
    // establecer sesion CURL
	$client = curl_init($url);
	
    // establecer opciones de transferencia
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($client, CURLOPT_HTTPHEADER, $headers);
	
    // get response from resource
    // ejecutar la sesion
	$response = curl_exec($client);
    curl_close($client);
	
	// decode
	$res = json_decode($response);
    echo 'Price of the book ' . $name . ' is: ' . ((empty($res->data)) ? 'NO VALUE' : '$' . $res->data);
}
else
{
    echo 'Nada recibido';
}