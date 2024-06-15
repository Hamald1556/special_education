<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Lessons</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS can be added here */
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="modification.php">Admin Dashboard</a>
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

<br><br><br>
<!-- Your PHP code for fetching and displaying lessons -->
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

// Check if the delete request is made
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lesson_id'])) {
    $lesson_id = $_POST['lesson_id'];
    // Delete the lesson from the database
    $sql_delete = "DELETE FROM lesson WHERE lesson_id = $lesson_id";
    if (mysqli_query($conn, $sql_delete)) {
        // Success modal
        echo '<div class="modal" id="successModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Success</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Lesson deleted successfully.
                        </div>
                    </div>
                </div>
            </div>';
        // Script to show the modal
        echo '<script>$("#successModal").modal("show");</script>';
    } else {
        echo "Error deleting lesson: " . mysqli_error($conn);
    }
}

// Fetch all lessons from the database
$sql = "SELECT * FROM lesson";
$result = mysqli_query($conn, $sql);

// Check if there are any lessons
if (mysqli_num_rows($result) > 0) {
    $count = 0; // Counter for tracking items in the row
    // Output data of each lesson
    while($row = mysqli_fetch_assoc($result)) {
        // Start a new row for every third item
        if ($count % 3 == 0) {
            echo '<div class="row">';
        }
?>
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $row["lesson_title"]; ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted">Author: <?php echo $row["author_name"]; ?></h6>
                    <p class="card-text"><?php echo $row["lesson_description"]; ?></p>
                    <p class="card-text"><strong>Materials:</strong> <?php echo $row["lesson_materials"]; ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="lesson_id" value="<?php echo $row["lesson_id"]; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
<?php
        $count++; // Increment the counter
        // End the row for every third item
        if ($count % 3 == 0) {
            echo '</div>';
        }
    }
    // If the last row is not complete, close it
    if ($count % 3 != 0) {
        echo '</div>';
    }
} else {
    echo "No lessons available.";
}

// Close database connection
mysqli_close($conn);
?>
<!-- End of PHP code -->

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
