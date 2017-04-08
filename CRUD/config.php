<?php

$con = mysqli_connect("localhost", "root", "", "test");
// check if fail
if (mysqli_connect_errno()) {
	printf("Connection fail: %s\n", mysqli_connect_error());
	exit();
}