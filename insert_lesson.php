<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "special_education";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $lessonTitle = mysqli_real_escape_string($conn, $_POST['lessonTitle']);
    $authorName = mysqli_real_escape_string($conn, $_POST['authorName']);
    $lessonDescription = mysqli_real_escape_string($conn, $_POST['lessonDescription']);
    $lessonMaterials = mysqli_real_escape_string($conn, $_POST['lessonMaterials']);

    // Attempt to insert data into the database
    $sql = "INSERT INTO lesson (lesson_title, author_name, lesson_description, lesson_materials) VALUES ('$lessonTitle', '$authorName', '$lessonDescription', '$lessonMaterials')";
    if (mysqli_query($conn, $sql)) {
        // echo "Lesson added successfully.";
        header("location: lesson_upload_success.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
