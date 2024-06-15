<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .module {
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .module i {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .module:hover {
      background-color: #f0f0f0; /* Light gray */
    }

    /* Background colors for different modules */
    /* .resources { background-color: #ffc107; } Yellow */
    /* .manage-users { background-color: #28a745; } Green */
    /* .lesson-plans { background-color: #007bff; } Blue */
    /* .modifications { background-color: #dc3545; } Red */
    /* .integrating-technology { background-color: #17a2b8; } Teal */
    /* .expert-insights { background-color: #6610f2; } Purple */
    /* .progress-tracking { background-color: #6c757d; } Gray */

    /* Media Query for Mobile */
    @media (max-width: 768px) {
      .module {
        padding: 15px;
      }
    }

    /* Ensure background color covers padding and border-radius */
    .module * {
      color: inherit;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Dashboard</a>
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
              <!-- <a class="dropdown-item" href="#">User Profile</a> -->
              <a class="dropdown-item" href="user_profile.php">User Profile</a>
              <!-- <a class="dropdown-item" href="#">Reset Password</a> -->
              <a class="dropdown-item" href="reset_password.php">Reset Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <!-- <h2>Admin Dashboard</h2> -->
    <div class="row">
      <div class="col-md-4">
        <a href="manage_resources.php" class="module resources">
          <i class="fas fa-book"></i>
          <h4>Resources</h4>
          <p>Manage educational resources.</p>
        </a>
      </div>
      <div class="col-md-4">
        <a href="manage_user.php" class="module manage-users">
          <i class="fas fa-user"></i>
          <h4>Manage Users</h4>
          <p>Manage user accounts and permissions.</p>
        </a>
      </div>
      <div class="col-md-4">
        <a href="lesson.php" class="module lesson-plans">
          <i class="fas fa-clipboard-list"></i>
          <h4>Lesson Plans</h4>
          <p>Create and manage lesson plans.</p>
        </a>
      </div>
      <div class="col-md-4">
        <a href="modification.php" class="module modifications">
          <i class="fas fa-wrench"></i>
          <h4>Modifications</h4>
          <p>Request and manage modifications.</p>
        </a>
      </div>
      <div class="col-md-4">
        <a href="integrating_technology.php" class="module integrating-technology">
          <i class="fas fa-laptop"></i>
          <h4>Integrating Technology</h4>
          <p>Explore technology integration.</p>
        </a>
      </div>
      <div class="col-md-4">
        <a href="expert_insight.php" class="module expert-insights">
          <i class="fas fa-chalkboard-teacher"></i>
          <h4>Expert Insights</h4>
          <p>Access expert insights and resources.</p>
        </a>
      </div>
      <div class="col-md-4">
        <a href="progress_tracking.php" class="module progress-tracking">
          <i class="fas fa-chart-line"></i>
          <h4>Progress Tracking</h4>
          <p>Track Lesson progress and performance.</p>
        </a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
