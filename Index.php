<!DOCTYPE html>
<html>
<head>
 <title>Order Result</title>
 <meta charset="UTF-8">
</head>
<body>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecommerce_db";
$port = 3307;
// Connect to MySQL
$conn = new mysqli($servername, $username, 
$password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $customer_name = $_POST["customer_name"];
 $product_name = $_POST["product_name"];
 $quantity = $_POST["quantity"];
 $price = $_POST["price"];
 // Insert order
 $sql = "INSERT INTO order_id
 (customer_name, product_name, quantity, 
price, order_date)
 VALUES
 ('$customer_name', '$product_name', 
'$quantity', '$price', CURDATE())";
 if ($conn->query($sql) === TRUE) {
 $total = $quantity * $price;
 echo "<h2>Order Placed Successfully</h2>";
 echo "Customer Name: " . $customer_name . 
"<br><br>";
 echo "Product Name: " . $product_name . 
"<br><br>";
 echo "Quantity: " . $quantity . "<br><br>";
 echo "Price: ₹" . $price . "<br><br>";
 echo "Total Price: ₹" . $total . "<br><br>";
 echo "<a href='view_orders.php'>View All 
Orders</a>";
 } else {
 echo "Error: " . $conn->error;
 }
}
$conn->close();
?>
</body>
</html>
