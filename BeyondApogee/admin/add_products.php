<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS */
    body {
      background-color: #f8f9fa;
    }
    .admin-container {
      background-color: #343a40;
      color: white;
      padding: 20px;
      border-radius: 5px;
    }
    .admin-container h4 {
      margin-bottom: 20px;
    }
    .admin-container .nav-item {
      margin-bottom: 10px;
    }
    .container {
      max-width: 500px;
      margin-top: 50px;
      border-radius: 10px;
      padding: 30px;
      background-color: #fff;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-label {
      font-weight: bold;
      color: #333;
    }
    .form-control {
      border-radius: 5px;
    }
    #btn {
      background-color: #007bff;
      border: none;
      color: #fff;
      font-weight: bold;
      transition: background-color 0.3s;
    }
    #btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 admin-container">
        <h4 class="mt-2">ADMIN</h4>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
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
      <div class="col-lg-10">
        <div class="container">
          <h2 class="text-center mb-4">Add Product</h2>
          <form action="adddb.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label class="form-label">Name</label>
              <input type="text" class="form-control shadow-none" name="product_name" required>
            </div>
            <div class="form-group">
              <label class="form-label">Price</label>
              <input type="number" class="form-control shadow-none" name="product_price" required>
            </div>
            <div class="form-group">
              <label class="form-label">Quantity</label>
              <input type="number" class="form-control shadow-none" name="product_qty" required>
            </div>
            <div class="form-group">
              <label class="form-label">Image (.jpg/.png/.jpeg Max 5MB)</label><br/>
              <input type="file" class="form-control-file shadow-none" name="product_image" required>
            </div>
            <div class="form-group">
              <label class="form-label">Code</label>
              <input type="text" class="form-control shadow-none" name="product_code" required>
            </div>
            <input type="submit" class="btn btn-primary form-control shadow-none" id="btn" name="submit" value="Add Product">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
