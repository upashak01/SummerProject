<?php
require('inc/essentials.php');

adminLogin();
session_regenerate_id(true); // Corrected session_regenerate_id usage

// Logout logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to the login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Corrected "initial scale" -->
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="preconnect" href="http://fonts.googleapis.com"> <!-- Corrected "preconnet" to "preconnect" -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Outline&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .admin-container {
            background-color: #343a40;
            color: white;
            padding: 20px;
            border-radius: 5px;
        }
        .dashboard-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-nav .nav-link.active {
            background-color: #495057;
            color: white !important;
        }
        .navbar-nav .nav-link:hover {
            background-color: #495057;
            color: white !important;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid bg-light text-dark p-3 d-flex align-items-center justify-content-between sticky-top">
        <h2 class="mb-3">Beyond Apogee</h2>
        <form method="POST" class="m-0">
            <button type="submit" name="logout" class="btn btn-outline-dark btn-sm">LogOut</button>
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 admin-container border-top border-3 border-secondary" id="dashboard-menu">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">ADMIN</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="add_products.php">Add Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="orders.php">Pending Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="removeproduct.php">Remove Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="orders_completed.php">Completed Orders</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-10">
                <div class="dashboard-content">
                    <h3>Welcome to the Admin Dashboard</h3>
                    <p>Manage all aspects of the website, including products, orders, and more.</p>
                    <!-- Interactive Dashboard Cards -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">Products</div>
                                <div class="card-body">
                                    <p class="card-text">Manage your products here.</p>
                                    <a href="add_products.php" class="btn btn-primary">Add Products</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">Orders</div>
                                <div class="card-body">
                                    <p class="card-text">View and manage orders here.</p>
                                    <a href="orders.php" class="btn btn-primary">Pending Orders</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">Completed Orders</div>
                                <div class="card-body">
                                    <p class="card-text">View completed orders here.</p>
                                    <a href="orders_completed.php" class="btn btn-primary">Completed Orders</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">Remove Products</div>
                                <div class="card-body">
                                    <p class="card-text">Remove products from catalog here.</p>
                                    <a href="removeproduct.php" class="btn btn-danger">Remove Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more interactive content as needed -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
