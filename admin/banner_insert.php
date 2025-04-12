<?php
if (isset($_POST['submit'])) {
    // Database connection
   include '../db_con.php';

    // Get form data
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $details = mysqli_real_escape_string($con, $_POST['details']);
    

    // Handle file upload
    $target_dir = "banner_uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
        echo "Sorry, only JPG, JPEG, webp & PNG files are allowed.";
        exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        exit;
    }

    // Attempt to move the uploaded file
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO add_banner (type, title, details, image_path) VALUES ('$type', '$title', '$details','$target_file')";

    if ($con->query($sql) === TRUE) {
      //  echo "New record created successfully";
        header('location:add_banner.php');
        
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>
