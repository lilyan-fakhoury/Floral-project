<?php
session_start();

$theid = $_SESSION['order_id'];
$customerId = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_uni";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data
$price = array();
$quantity = array();
$sql = "SELECT price, quantity FROM items WHERE Cus_id ='$customerId' AND order_id ='$theid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Remove the dollar sign and convert to numeric value
        $price[] = floatval(str_replace('$', '', $row['price']));
        $quantity[] = $row['quantity'];
    }
}

$total_amount = 0;
$i=0;

for ($i = 0; $i < count($price); $i++) {
    $total_amount += $price[$i] * $quantity[$i];
}



    
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $neworder = "INSERT INTO orders (order_id, Cus_ID, order_date, total_amount)
                 VALUES ('$theid', '$customerId', CURRENT_DATE, $total_amount)";
    $result2 = $conn->query($neworder);
    if ($result2) {

        header("Location:cart.php?send=addorderpage");
        exit(); }
  
}
?>








