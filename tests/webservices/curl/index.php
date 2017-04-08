<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Basic CURL example
echo '<h1>Basic CURL example</h1>';
echo '<h3>Getting data from URL</h3>';

// 1.- Initialize
$ch = curl_init();

// 2.- Set Options
/*
// URL to send the request to
curl_setopt($ch, CURLOPT_URL, 'http://www.google.com');
// return instead of outputting directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// whether to include the header in the output. Set to false here
curl_setopt($ch, CURLOPT_HEADER, 0);
*/
$curl_array_opt = [
    CURLOPT_URL             => 'http://www.google.com',
    CURLOPT_RETURNTRANSFER  => 1,
    CURLOPT_HEADER          => 0
];

curl_setopt_array($ch, $curl_array_opt);

// 3.- Execute the request and fetch the response. Chech for errors
$output = curl_exec($ch);

if ($output === FALSE)
{
    echo 'cURL Error: ' . curl_error($ch);
}

// 4.- Close and free up the curl handle
curl_close($ch);

// 5.- Display raw output
print_r($output);