<!DOCTYPE html>
<html>
<head>
	<title>Order Summary</title>
</head>
<body>
	<h1>Order Summary</h1>

	<?php
		// Get form data
		$customer_name = $_POST['customer_name'];
		$delivery_address = $_POST['delivery_address'];
		$jar_type = $_POST['jar_type'];
		$quantity = $_POST['quantity'];
		$payment_status = $_POST['payment_status'];

		// Calculate total amount
		if ($jar_type == 'Round Container with Cap') {
			$price = 20;
		} elseif ($jar_type == 'Square Container with Cap') {
			$price = 25;
		} else {
			$price = 30;
		}
		$total_amount = $quantity * $price;

		// Print table
		echo '<table>';
		echo '<tr><td>Customer Name:</td><td>' . $customer_name . '</td></tr>';
		echo '<tr><td>Delivery Address:</td><td>' . $delivery_address . '</td></tr>';
		echo '<tr><td>Jar Type:</td><td>' . $jar_type . '</td></tr>';
		echo '<tr><td>Quantity:</td><td>' . $quantity . '</td></tr>';
		echo '<tr><td>Price:</td><td>' . $price . '</td></tr>';
		echo '<tr><td>Total Amount:</td><td>' . $total_amount . '</td></tr>';
		echo '<tr><td>Payment Status:</td><td';