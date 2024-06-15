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

// Fetch the latest resource from the database
$sql = "SELECT * FROM resources ORDER BY id DESC LIMIT 1"; // Order by id in descending order to get the latest record
$result = mysqli_query($conn, $sql);

// Fetch the latest resource data
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resource and Lesson Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS can be added here */
    .card-img-top {
        max-height: 200px; /* Set the maximum height */
        width: auto; /* Maintain the aspect ratio */
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="admin.php">Admin Dashboard</a>
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
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">Resource and Lesson Management</h2>
        <div class="text-center">
          <!-- Button to view uploaded resources -->
          <a href="view_resources.php" class="btn btn-primary mr-3">View Resources</a>
          <!-- Button to view uploaded lessons -->
          <a href="view_lessons.php" class="btn btn-primary">View Lessons</a>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-6">
        <h3 class="mb-3">Latest Resources</h3>
        <!-- Display the latest resource card -->
        <?php if (!empty($row)) { ?>
        <div class="card mb-3">
          <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Resource Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['resource_name']; ?></h5>
            <p class="card-text"><?php echo $row['resource_description']; ?></p>
            <a href="#" class="btn btn-primary">View Resource</a>
          </div>
        </div>
        <?php } else { ?>
        <p>No resources available.</p>
        <?php } ?>
      </div>
      <div class="col-md-6">
        <h3 class="mb-3">Latest Lesson</h3>
        <!-- Fetch the latest lesson from the database -->
        <?php
        // Fetch the latest lesson
        $sql_latest_lesson = "SELECT * FROM lesson ORDER BY lesson_id DESC LIMIT 1";
        $result_latest_lesson = mysqli_query($conn, $sql_latest_lesson);
        
        if ($result_latest_lesson && mysqli_num_rows($result_latest_lesson) > 0) {
            $row_latest_lesson = mysqli_fetch_assoc($result_latest_lesson);
        ?>
        <!-- Display the latest lesson card -->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row_latest_lesson['lesson_title']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Author: <?php echo $row_latest_lesson['author_name']; ?></h6>
            <p class="card-text"><?php echo $row_latest_lesson['lesson_description']; ?></p>
            <p class="card-text"><strong>Materials:</strong> <?php echo $row_latest_lesson['lesson_materials']; ?></p>
          </div>
        </div>
        <?php } else { ?>
        <p>No lessons available.</p>
        <?php } ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
