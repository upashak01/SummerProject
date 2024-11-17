<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Remove Product</h2>
        <form method="POST">
            <div class="form-group">
                <label for="product_code">Product Code:</label>
                <input type="text" class="form-control" id="product_code" name="product_code" required>
            </div>
            <button type="submit" name="remove_product" class="btn btn-danger">Remove Product</button>
        </form>

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

        // Check if form is submitted for product removal
        if (isset($_POST['remove_product'])) {
            $product_code = $_POST['product_code'];

            // SQL to check if product code exists
            $check_sql = "SELECT * FROM product WHERE product_code = '$product_code'";
            $result = $conn->query($check_sql);

            if ($result->num_rows > 0) {
                // Product code exists, proceed with deletion
                $delete_sql = "DELETE FROM product WHERE product_code = '$product_code'";
                if ($conn->query($delete_sql) === TRUE) {
                    echo "<p class='mt-3 text-success'>Product removed successfully</p>";
                } else {
                    echo "<p class='mt-3 text-danger'>Error removing product: " . $conn->error . "</p>";
                }
            } else {
                // Product code does not exist
                echo "<p class='mt-3 text-danger'>Product with code $product_code does not exist</p>";
            }
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
