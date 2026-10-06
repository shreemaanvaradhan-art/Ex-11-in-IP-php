<!DOCTYPE html>
<html>
<head>
 <title>View Orders</title>
 <meta charset="UTF-8">
</head>
<body>
<h2>All Orders</h2>
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecommerce_db";
$port = 3307;
// Connect to MySQL
$conn = new mysqli($servername, $username, 
$password, $dbname, $port);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
// Retrieve orders
$sql = "SELECT * FROM order_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 echo "<table border='1' cellpadding='10'>";
 echo "<tr>";
 echo "<th>Customer Name</th>";
 echo "<th>Product Name</th>";
 echo "<th>Quantity</th>";
 echo "<th>Price</th>";
 echo "<th>Order Date</th>";
 echo "</tr>";
 while ($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo "<td>" . $row["customer_name"] . "</td>";
 echo "<td>" . $row["product_name"] . "</td>";
 echo "<td>" . $row["quantity"] . "</td>";
 echo "<td>₹" . $row["price"] . "</td>";
 echo "<td>" . $row["order_date"] . "</td>";
 echo "</tr>";
 }
 echo "</table>";
} else {
 echo "No orders found.";
}
$conn->close();
?>
<br><br>
<a href="shoping.html">Place New Order</a>
</body>
</html>
