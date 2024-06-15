<?php
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

// Get form data
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$stmt_check_email = $conn->prepare("SELECT * FROM registration WHERE email = ?");
$stmt_check_email->bind_param("s", $email);
$stmt_check_email->execute();
$result = $stmt_check_email->get_result();

if ($result->num_rows > 0) {
    // Email already exists
    // echo "Email already exists!";
    header("location: email_exist.php");
} else {
    // Email doesn't exist, proceed with registration
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        //   echo "New record created successfully";
        header("location: registration_success.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close statements
$stmt->close();
$stmt_check_email->close();

// Close connection
$conn->close();
?>
