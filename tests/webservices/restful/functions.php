<?php

function get_price($find)
{
	$books = ['java' => 299, 'c' => 348, 'php' => 267];
	
	foreach($books as $book => $price)
	{
		if ($book == $find)
		{
			return $price;
		}
	}
}

function deliver_response($status, $status_message, $data)
{
	header("HTTP/1.1 $status $status_message");
	$response = [];
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	echo json_encode($response);
}