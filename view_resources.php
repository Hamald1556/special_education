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

// Delete resource
$delete_message = ""; // Initialize delete message variable
if(isset($_POST['delete_resource'])) {
    $resource_id = $_POST['resource_id'];
    $delete_sql = "DELETE FROM resources WHERE id = $resource_id";
    if(mysqli_query($conn, $delete_sql)) {
        $delete_message = "Resource deleted successfully";
    } else {
        $delete_message = "Error deleting resource";
    }
}

// Fetch resources from the database
// Example query, replace with your actual query
$sql = "SELECT * FROM resources";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Resources</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS can be added here */
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
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
<br>
<div class="container mt-5">
  <h2 class="text-center mb-4">View Resources</h2>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Resource Image">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['resource_name']; ?></h5>
            <p class="card-text"><?php echo $row['resource_description']; ?></p>
            <form method="post">
              <input type="hidden" name="resource_id" value="<?php echo $row['id']; ?>">
              <button type="submit" name="delete_resource" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap modal for delete message -->
<div class="modal fade" id="deleteMessageModal" tabindex="-1" role="dialog" aria-labelledby="deleteMessageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteMessageModalLabel">Delete Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $delete_message; ?>
      </div>
    </div>
  </div>
</div>

<!-- Script to trigger the modal -->
<script>
  $(document).ready(function(){
    <?php if(!empty($delete_message)) { ?>
      $('#deleteMessageModal').modal('show');
    <?php } ?>
  });
</script>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
