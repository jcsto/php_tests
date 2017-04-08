<?php
require 'functions.php';
// process client request (VIA URL)
header("Content-Type:application/json");

// asignar una clave
$seceretKey = '32Xhsdf7asd';

if ($_SERVER['REQUEST_URI'])
{
	//$name = $_GET['name'];
	$name = array_values(array_slice(explode('/', $_SERVER['REQUEST_URI']), -1))[0];	
	$price = get_price($name);
	
	if(empty($price))
	{
		//deliver_response(200, 'book not found', NULL);
	}
	else
    {
		deliver_response(200, 'book found', $_SERVER['REQUEST_URI']);
    }
}
else
{
	// invalid request
	//deliver_response(400, 'Invalid request', NULL);
}

