<?php

// Include the database connection file
include 'config.php';

// Check if the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email_reg'];
    $phone = $_POST['phone'];
    $password = $_POST['password_reg'];

    // Perform any necessary validation checks here

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email_reg, phone, password_reg) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        // Registration successful
        echo json_encode(array("success" => true, "message" => "Registration successful"));
    } else {
        // Registration failed
        echo json_encode(array("success" => false, "message" => "Registration failed"));
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}


// include 'config.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
//     // Retrieve and sanitize form data
//     $first_name = $conn->real_escape_string($_POST['first_name']);
//     $last_name = $conn->real_escape_string($_POST['last_name']);
//     $email = $conn->real_escape_string($_POST['email']);
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
//     $phone = $conn->real_escape_string($_POST['phone']);

//     // SQL to insert data into users table using prepared statement
//     $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, phone) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("sssss", $first_name, $last_name, $email, $password, $phone);

//     if ($stmt->execute()) {
//         // Registration successful
//         echo "Registration successful!";
//     } else {
//         // Error handling
//         echo "Error: " . $stmt->error;
//     }
//     $stmt->close();
// }

$conn->close();
?>
