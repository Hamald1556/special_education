<?php
// Check if form is submitted
if (isset($_POST['submit'])) {
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

    // Get form data
    $resourceName = $_POST['resourceName'];
    $resourceDescription = $_POST['resourceDescription'];

    // File upload handling
    $targetDir = "resource-images/"; // Directory where images will be uploaded
    $targetFile = $targetDir . basename($_FILES["resourceImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["resourceImage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["resourceImage"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["resourceImage"]["tmp_name"], $targetFile)) {
            // File uploaded successfully, insert data into database
            $imagePath = $targetFile;

            // SQL query to insert data into the table
            $sql = "INSERT INTO resources (resource_name, resource_description, image) VALUES (?, ?, ?)";

            // Prepare the SQL statement
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind parameters and execute the statement
            $stmt->bind_param("sss", $resourceName, $resourceDescription, $imagePath);

            if ($stmt->execute() === false) {
                die("Execute failed: " . $stmt->error);
            }

            // echo "Resource uploaded successfully.";
            header("location: resource_success.php");

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    // Redirect user back to the form page if form is not submitted
    header("Location: admin.php");
    exit();
}
?>
