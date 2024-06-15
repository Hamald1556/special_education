<?php
// Check if the ID parameter is set
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

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $new_username = $_POST['username'];
        $new_email = $_POST['email'];

        // Prepare update query
        $sql = "UPDATE teachers SET username='$new_username', email='$new_email' WHERE id='$teacher_id'";

        if ($conn->query($sql) === TRUE) {
            // echo "Record updated successfully";
            header("location: record_updated.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    // Close database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="manage_user.php">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> User
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">User Profile</a>
              <a class="dropdown-item" href="#">Reset Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>
<div class="container mt-5">
    <h2>Update Teacher</h2>
    <?php
    // Display form if ID parameter is set
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

        // Prepare SQL statement to select data of the specific teacher
        $sql = "SELECT id, username, email FROM teachers WHERE id='$teacher_id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Fetch data of the specific teacher
            $row = $result->fetch_assoc();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$teacher_id; ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?php
        } else {
            echo "Teacher not found.";
        }

        // Close database connection
        $conn->close();
    } else {
        echo "Invalid request.";
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
