<?php
include 'server/config.php';

// Check if user is logged in as admin
// session_start();
// if (!isset($_SESSION['admin'])) {
//     header("Location: login.php"); // Redirect to login page if not logged in as admin
//     exit();
// }

// Delete order if delete button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $order_id = $_POST['order_id'];
    $sql = "DELETE FROM orders WHERE id=$order_id";
    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully";
    } else {
        echo "Error deleting order: " . $conn->error;
    }
}

// Query orders from database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

// Check if orders exist
if ($result->num_rows > 0) {
    // Output data of each order in a table
    echo "<table border='1'>";
    echo "<tr><th>Order ID</th><th>Product</th><th>Quantity</th><th>Price</th><th>Location</th><th>Payment Method</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["product"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["price"] . "</td>"; // Display price
        echo "<td>" . $row["location"] . "</td>"; // Display location
        echo "<td>" . $row["payment_method"] . "</td>"; // Display payment method
        echo "<td>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='order_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No orders found";
}

$conn->close();
?>
