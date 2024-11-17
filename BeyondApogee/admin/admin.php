<?php
include 'config.php';

// Check if user is logged in as admin
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if not logged in as admin
    exit();
}

// Query orders from database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// Check if orders exist
if ($result->num_rows > 0) {
    // Output data of each order
    while($row = $result->fetch_assoc()) {
        echo "Order ID: " . $row["id"]. " - Product: " . $row["product"]. " - Quantity: " . $row["quantity"]. "<br>";
    }
} else {
    echo "No orders found";
}

$conn->close();
?>
