<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize_input($_POST["login_email"]);
    $password = sanitize_input($_POST["login_password"]);

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Start session and set user email
            $_SESSION['user_email'] = $email;
            // Redirect to index.php
            header('Location: ../indexlog.php');
            exit(); // Make sure to exit after a header redirect
        } else {
            header('Location: inc/incorrect_password.php');
            exit();
        }
    } else {
        echo "User not found";
    }
}
?>