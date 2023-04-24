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


<div class="user-profile" id="profMenu">
        <div class="user-profile-options">
            <img src="System/img/Default-prof.jpg" alt="Profile Picture">
                <div class="username-role">
                    <h3>Karl Estenzo
                    <p>Owner</p>
                </div>
                
                
            <hr class="hr-line">

        <a href="#">
        <span class="material-symbols-outlined">manage_accounts</span>
            Edit Profile
        </a>

        <a href="#">
        <span class="material-symbols-outlined">settings</span>
            Settings
        </a>

        <a href="login.php">
            <span class="material-symbols-outlined">logout</span>
            Log out
        </a>
        </div>
    </div>

    <aside class="side-bar">
        <div class="logo">
        <img src="system/img/SVGLOG.svg" alt="Logo">

            <h3>Aqua Fusion</h3>
        </div>
        <!-- <p>Hello <span id="username"></span>, welcome to Aqua Fusion Management System, where you can easily track your sales records.</p> -->
            <div class="nav-items">
                <a href="dash.php">
                <i class="material-icons md-48">dashboard</i>
                Dashboard
                </a>
                
                <a href="sales.php">
                <span class="material-icons">shopping_cart</span>
                Sales
                </a>

                <a href="reportsales.php">
                <span class="material-symbols-outlined">equalizer</span>
                Report sales
                </a>
            </div>
    </aside>
    <section class="top-bar">
        <div class="profile">
            <img src="System/img/Default-prof.jpg" alt="Profile Picture" onclick="profClick()">

            <script>
    let profMenu = document.getElementById("profMenu");

    function profClick(){
        profMenu.classList.toggle("open-prof-menu");
    }
</script>

            <span class="material-symbols-outlined"></span>
        </div>
    </section>
    <?php
include ('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $type = $_POST['type'];
    $delivery_address = $_POST['delivery_address'];
    $jar_type = $_POST['jar_type'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $payment_status = $_POST['payment_status'];
    $total_amount = $quantity * $price;

    $sql = "UPDATE orders SET customer_name='$customer_name', type='$type', delivery_address='$delivery_address', jar_type='$jar_type', quantity='$quantity', price='$price', payment_status='$payment_status', total_payment='$total_amount' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header('Location: dash.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM orders WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: Invalid ID.";
        exit;
    }
} else {
    echo "Error: ID not set.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>
    <h1>Edit Order</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Customer Name:</label><br>
        <input type="text" name="customer_name" value="<?php echo $row['customer_name']; ?>"><br>
        <label>Type:</label><br>
        <input type="text" name="type" value="<?php echo $row['type']; ?>"><br>
        <label>Delivery Address:</label><br>
        <input type="text" name="delivery_address" value="<?php echo $row['delivery_address']; ?>"><br>
        <label>Jar Type:</label><br>
        <input type="text" name="jar_type" value="<?php echo $row['jar_type']; ?>"><br>
        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>"><br>
        <label>Price:</label><br>
        <input type="number" name="price" value="<?php echo $row['price']; ?>"><br>
        <label>Payment Status:</label><br>
        <select name="payment_status">
            <option value="paid" <?php if ($row['payment_status'] == 'paid') 
echo 'selected'; ?>>Paid</option>
<option value="unpaid" <?php if ($row['payment_status'] == 'unpaid') echo 'selected'; ?>>Unpaid</option>
</select><br>
<br>
<button type="submit">Update Order</button>
</form>

</body>
</html>