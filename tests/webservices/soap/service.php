<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
require 'client.php';

$id_array = ['id' => '1'];
$client->getName($id_array);
echo '<br>FINISH.';
