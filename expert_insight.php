<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expert Insights and Resources</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    /* Add custom styles here */
    .icon {
      font-size: 48px;
      cursor: pointer;
    }

    .section {
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      height: 200px; /* Set fixed height */
    }

    .training-section {
      background-color: #ffe6cc; /* Light orange */
    }

    .feedback-section {
      background-color: #cfe2f3; /* Light blue */
    }

    /* Flexbox */
    .row.flex {
      display: flex;
      flex-wrap: wrap;
    }

    .col-md-6 {
      flex: 0 0 50%; /* Set each column to occupy 50% of the width */
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
<br><br>
  <div class="container mt-5">
    <h1 class="text-center">Expert Insights and Resources</h1>
    
    <div class="row mt-4 flex">
      <div class="col-md-6">
        <div class="section training-section d-flex align-items-center justify-content-center">
          <a href="training_programs.php">
            <i class="fas fa-chalkboard-teacher icon"></i>
            <p>Training and Development Programs</p>
          </a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="section feedback-section d-flex align-items-center justify-content-center">
          <a href="progress_tracking.php">
            <i class="far fa-comments icon mt-4"></i>
            <p>Feedback and Evaluation</p>
          </a>
        </div>
      </div>
    </div>
    
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
