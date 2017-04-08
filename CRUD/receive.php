<?php

require 'config.php';

$flag = 1;
$q = '';
$telephone = 0;
$zip = 0;

if ($_POST) {
	
	foreach ($_POST as $k => $val) {
		$$k = "";
		if (htmlspecialchars($val) && mysqli_real_escape_string($con, $val)) {
			$$k = $val;
		}
	}

	switch ($t) {
		case 1:
		// DELETE
			$q = 'DELETE FROM customers WHERE idCustomer = ' . $id;
		break;
		case 2:
		// UPD
			$q = ' UPDATE customers SET name="' . $name . '", email="' . $email . '", telephone="' . $telephone . '", street="' . $street . '", city="' . $city . '", state="' . $state . '", zip="' . $zip . '" WHERE idCustomer = "' . $id . '";';
		break;
		case 3:
		// INSRT
		if (empty($name) || empty($email))
			$flag = false;
		else
			$q = ' INSERT INTO customers SET name="' . $name . '", email="' . $email . '", telephone="' . $telephone . '", street="' . $street . '", city="' . $city . '", state="' . $state . '", zip="' . $zip . '";';
		break;
	}
	//echo $q;
	if (!mysqli_query($con, $q))
		$flag = 0;
	
}

echo $flag;


?>