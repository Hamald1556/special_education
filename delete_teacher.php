<?php
// Check if ID parameter is set and not empty
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root"; // Default username for XAMPP
    $password = ""; // Default password for XAMPP
    $database = "special_education";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the ID from the URL parameter
    $teacher_id = $_GET['id'];

    // Prepare SQL statement to delete the teacher record
    $sql = "DELETE FROM teachers WHERE id='$teacher_id'";

    // Execute the deletion query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to admin.php after successful deletion
        header("Location: delete_success.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close database connection
    $conn->close();
} else {
    // If ID parameter is not set or empty, redirect back to admin.php
    header("Location: admin.php");
    exit();
}
?>
