<?php
include('../db_con.php');

if (isset($_POST['submit'])) {
    // Assuming 'id' or another field identifies the record
    $id = $_POST['id'];  // You will pass 'id' from the form as a hidden input
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $company_name = $_POST['company_name'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $status = $_POST['status'];
    $date = date('Y-m-d');
    $sequence_number = $_POST['sequence_number'];

    // Prepare the update query (use 'id' or another identifier here)
    $stmt = $con->prepare("UPDATE client_feedback 
                           SET name = ?, 
                               designation = ?, 
                               company_name = ?, 
                               rating = ?, 
                               feedback = ?, 
                               status = ?, 
                               date = ?, 
                               sequence_number = ? 
                           WHERE id = ?");  // Use 'id' or another unique column instead of 'client_id'
    
    $stmt->bind_param("ssssssssi", $name, $designation, $company_name, $rating, $feedback, $status, $date, $sequence_number, $id);

    if ($stmt->execute()) {
        // Handle image uploads (if any)
        $target_dir = "../project/client_uploads/";

        foreach ($_FILES['images']['name'] as $key => $image_name) {
            $unique_image_name = uniqid() . "_" . basename($image_name);
            $target_file = $target_dir . $unique_image_name;

            // Validate and move uploaded files
            if (in_array(strtolower(pathinfo($image_name, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif'])) {
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                    // Insert the image into the database (use 'id' to associate the image with the feedback)
                   // $con->query("INSERT INTO client_feedback_images (client_id, image) VALUES ('$id', '$unique_image_name')");
                   
                   $con->query("UPDATE client_feedback_images SET image = '$unique_image_name' WHERE client_id = '$id'");
                }
            }
        }

        // Redirect after successful update
        header('Location: client_feedback_list.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
}

$con->close();
?>

