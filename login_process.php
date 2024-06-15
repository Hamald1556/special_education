<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "special_education";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debugging: Check received email and password
    error_log("Received Email: $email");
    error_log("Received Password: $password");

    // Query to fetch user data
    $stmt = $conn->prepare("SELECT user_id, password, role FROM registration WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }

    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Debugging: Check fetched data
        error_log("Fetched User Data: " . print_r($row, true));

        if (password_verify($password, $row['password'])) {
            // Password is correct
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $row['role'];
            
            // Debugging: Check role and redirection
            error_log("Login Successful, Role: " . $row['role']);
            
            if ($row['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            // Password is incorrect
            $_SESSION['error_message'] = "Invalid password!";
            error_log("Invalid password for user: " . $email);
            header("Location: index.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['error_message'] = "User not found!";
        error_log("User not found: " . $email);
        header("Location: index.php");
        exit();
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
