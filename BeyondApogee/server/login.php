<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Retrieve form data
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // SQL to query user by email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Login successful
            echo "Login successful!";
        } else {
            // Invalid password
            echo "Invalid email or password!";
        }
    } else {
        // User not found
        echo "Invalid email or password!";
    }
    $stmt->close();
}

$conn->close();
?>
