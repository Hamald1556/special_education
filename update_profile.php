<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

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

// Get user_id
$user_id = $_SESSION['user_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update user's profile
    $sql = "UPDATE registration SET first_name = '$first_name', last_name = '$last_name', email = '$email', role = '$role' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to user profile page after successful update
        header("Location: profile_update_success.php");
        exit();
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
