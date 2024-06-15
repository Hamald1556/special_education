<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Special Education Lesson</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Add custom styles here */
    body {
      padding-top: 60px; /* Adjust according to navbar height */
    }
  </style>
</head>
<body>
  <!-- Navigation Bar -->
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

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <!-- Lesson Form -->
        <form id="lessonForm" method="post" action="insert_lesson.php">
          <!-- Lesson Title -->
          <div class="form-group">
            <label for="lessonTitle">Lesson Title</label>
            <input type="text" class="form-control" id="lessonTitle" name="lessonTitle" placeholder="Enter lesson title">
          </div>
          <!-- Author Name -->
          <div class="form-group">
            <label for="authorName">Author Name</label>
            <input type="text" class="form-control" id="authorName" name="authorName" placeholder="Enter author name">
          </div>
          <!-- Lesson Description -->
          <div class="form-group">
            <label for="lessonDescription">Lesson Description</label>
            <textarea class="form-control" id="lessonDescription" name="lessonDescription" rows="3" placeholder="Enter lesson description"></textarea>
          </div>
          <!-- Lesson Materials -->
          <div class="form-group">
            <label for="lessonMaterials">Lesson Materials</label>
            <textarea class="form-control" id="lessonMaterials" name="lessonMaterials" rows="3" placeholder="Enter lesson materials"></textarea>
          </div>
          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
