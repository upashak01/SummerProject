<?php
// Include database connection code here if not already included
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch pending orders
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);

// Function to move pending order to completed orders table
function completeOrder($conn, $orderID) {
    // Retrieve pending order details
    $sql = "SELECT * FROM orders WHERE id = $orderID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Insert pending order details into completed orders table
    $insertSql = "INSERT INTO completed_orders (name, phone, address, products, amount_paid) VALUES ('{$row['name']}', '{$row['phone']}', '{$row['address']}', '{$row['products']}', '{$row['amount_paid']}')";
    mysqli_query($conn, $insertSql);

    // Delete pending order from pending orders table
    $deleteSql = "DELETE FROM orders WHERE id = $orderID";
    mysqli_query($conn, $deleteSql);
}

// Check if the complete button is clicked
if(isset($_POST['complete_order'])) {
    $orderID = $_POST['order_id'];
    completeOrder($conn, $orderID);
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Pending Orders</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Products</th>
                    <th>Amount Paid</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output pending order details in HTML table rows
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['products']}</td>";
                        echo "<td>{$row['amount_paid']}</td>";
                        echo "<td>
                                <form method='post'>
                                    <input type='hidden' name='order_id' value='{$row['id']}'>
                                    <button type='submit' name='complete_order' class='btn btn-primary'>Complete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No pending orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
// Close database connection if needed
mysqli_close($conn);
?>
