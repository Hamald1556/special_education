<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> User
            </a> -->
            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">User Profile</a>
              <a class="dropdown-item" href="#">Reset Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div> -->
          </li>
        </ul>
      </div>
    </div>
</nav>
<br>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h2>User Profile</h2>
        </div>
        <div class="card-body">
          <form action="update_profile.php" method="POST">
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

            // Fetch user details based on user_id
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT first_name, last_name, email, role FROM registration WHERE user_id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display user details
                $row = $result->fetch_assoc();
                ?>
                <div class="form-group row">
                  <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name:</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name:</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <label for="role" class="col-md-4 col-form-label text-md-right">Role:</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="role" value="<?php echo $row['role']; ?>">
                  </div> -->
                </div>
                <?php
            } else {
                echo "User not found!";
            }

            // Close connection
            $conn->close();
            ?>
            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
