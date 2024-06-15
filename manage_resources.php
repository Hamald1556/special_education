<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Needs Education Resources</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
        <h1 class="mb-4">Special Needs Education Resources</h1>
        <form action="resource_upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="resourceName">Resource Name:</label>
                <input type="text" class="form-control" id="resourceName" name="resourceName" placeholder="Enter resource name">
            </div>
            <div class="form-group">
                <label for="resourceDescription">Resource Description:</label>
                <textarea class="form-control" id="resourceDescription" name="resourceDescription"
                    placeholder="Enter resource description"></textarea>
            </div>
            <div class="form-group">
                <label for="resourceFile">Upload Resource Image:</label>
                <input type="file" class="form-control-file" id="resourceFile" name="resourceImage">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Upload Resource</button>
        </form>
        <hr>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-RriP1F5oBvEZK3KS9nDzP1mBU9p1osxEvhlaDw1kBuAlJABP1RfbcFpDkKGzkfDw"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shCk+EAq0DHtg6BjVqvcC1rYuqj3G2hC2qK9w"
        crossorigin="anonymous"></script>
</body>

</html>
