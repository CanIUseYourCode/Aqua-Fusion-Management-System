<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dash-style.css">
    <title>AFR Management System</title>
</head>
<body>
<?php include('web-template.php'); ?>
        <!-- Overview Cards -->
</section>
    <section class="data-cards-container">
    <h1><i class="fas fa-coins"></i>  Recent Transactions</h1> 
    <h1><i class="material-symbols-outlined">bar_chart_4_bars</i>  Overview</h1>
        <div class="data-cards-values">
            <h3>832</h3>
            <i class="fas fa-tags"></i>
            <span>Total Sales</span>
            <p>Last 24hrs</p>
        </div>

        <div class="data-cards-values">
            <h3>4232</h3>
            <span>Number of items</span>
            <p>Last 24hrs</p>
        </div>
        
        <div class="data-cards-values">
            <h3>732</h3>
            <span>Gallons Sold</span>
            <p>Last 24hrs</p>
        </div>

        <div class="data-cards-values">
            <h3>245</h3>
            <i class="fas fa-dollar-sign"></i>
            <span>Revenue</span>
            <p>Last 24hrs</p>
        </div>
</section>
        <!-- Display table data -->
<section class="table-data">
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
          <th>Name</th>
          <th>Type</th>
          <th>Delivery Address</th>
          <th>Jar Type</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total </th>
          <th>Payment Status</th>
          <th>Date Created</th>
          <th>Edit</th>
            </tr>
         </thead>
         <tbody>  
<?php 
    include ('config.php');
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $customer_name = $_POST['customer_name'];
          $type = $_POST['type'];
          $delivery_address = $_POST['delivery_address'];
          $jar_type = $_POST['jar_type'];
          $quantity = $_POST['quantity'];
          $price = $_POST['price'];
          $payment_status= $_POST['payment_status'];
          $date = $_POST['date'];
     
     
          // Insert the data into the database if no errors
          if (empty($error_msgs)) {
              $total_amount = $quantity * $price;
              $sql = "INSERT INTO orders (id, customer_name, type, delivery_address, jar_type, quantity, payment_status, total_payment, price, order_date)
              VALUES ('$next_id', '$customer_name', '$type', '$delivery_address', '$jar_type', '$quantity', '$payment_status', '$total_amount', '$price', '$date')";
            
          }
      }
       
     
      // Get the current date and time
      $date = date('Y-m-d H:i:s');
      // Display the error messages in a table if any
      if (!empty($error_msgs)) {
          echo "<table>";
          foreach ($error_msgs as $msg) {
              echo "<tr><td>Error:</td><td>$msg</td></tr>";
          }
          echo "</table>";
      }
     
         $sql = "SELECT * FROM orders";
         $result = mysqli_query($conn, $sql);
         
      function random_string($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $randIndex = rand(0, strlen($chars) - 1);
            $str .= $chars[$randIndex];
        }
        return $str;
    }
    
  for ($i = 3; $i <= 12; $i++) { 
    $date = date("Y-m-d", mt_rand(strtotime("2022-01-01"), strtotime("2023-12-31")));
    $name = ucfirst(strtolower(random_string(8)));
    $type = (mt_rand(0,1) == 1) ? "Online Order" : "In-Store Purchase";
    $status = (mt_rand(0,1) == 1) ? "paid" : "unpaid";
    $items = mt_rand(1, 5);
    $amount = "$" . number_format(mt_rand(999, 9999) / 100, 2);
  }
     while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['id'] . '</td>';
          echo '<td>' . $row['customer_name'] . '</td>';
          echo '<td>' . $row['type'] . '</td>';
          echo '<td>' . $row['delivery_address'] . '</td>';
          echo '<td>' . $row['jar_type'] . '</td>';
          echo '<td>' . $row['quantity'] . '</td>';
          echo '<td>' . $row['price'] . '</td>';
          echo '<td>' . $row['total_payment'] . '</td>';
          echo '<td>' . $row['payment_status'] . '</td>';
          echo '<td>' . $row['order_date'] . '</td>';
          echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
          echo '</tr>'; 
    
 } ?>
    </tbody>
    </table>
    
    <div class="bottom-menu">
        <p>
            <br>
        </p>
    </div>
    <a href="sales.php"><button class="create-new-button">Create New</button></a>
</body>
</html>