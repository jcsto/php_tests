<?php

// POST data with CURL --------

echo '<h1>Basic CURL example</h1>';
echo '<h3>Posting data</h3>';

// 1.- Basic setup
$url = 'http://miscellaneous-115933.nitrousapp.com:3000/curl/output.php';
$post_data = [
    'query'     => 'some stuff',
    'method'    => 'post',
    'ya'        => 'hoo'
];

// 2. Initialize
$ch = curl_init();

// 3.- Set options
//URL to submit to
curl_setopt($ch, CURLOPT_URL, $url);

// Return output instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// we are doing a POST request
curl_setopt($ch, CURLOPT_POST, 1);

// adding the post variables to the request
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// 4.- Execute the request and fetch the response, check for errors
$output = curl_exec($ch);

if ($output === FALSE)
{
    echo 'cURL Error: ' . curl_error($ch);
}

// 5.- Close and free up the curl handle
curl_close($ch);

// 6.- Display raw output
print_r($output);