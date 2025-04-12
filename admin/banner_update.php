<?php
if (isset($_POST['submit'])) {
    // Database connection
    include '../db_con.php';

    // Get form data
    $banner_id = mysqli_real_escape_string($con, $_POST['banner_id']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $details = mysqli_real_escape_string($con, $_POST['details']);

    $update_image = false;
    if (!empty($_FILES["image"]["tmp_name"])) {
        // Handle file upload
        $target_dir = "banner_uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a real image or a fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            exit;
        }

        // Check if file already exists
       // if (file_exists($target_file)) {
       //     echo "Sorry, file already exists.";
       //     exit;
       // }

        // Attempt to move the uploaded file
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }

        $update_image = true;
    }

    // Update data in the database
    if ($update_image) {
        $sql = "UPDATE add_banner SET type='$type', title='$title', details='$details',  image_path='$target_file' WHERE id='$banner_id'";
    } else {
        $sql = "UPDATE add_banner SET type='$type', title='$title', details='$details' WHERE id='$banner_id'";
    }

    if ($con->query($sql) === TRUE) {
        header('location:banner_list.php');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}
?>
