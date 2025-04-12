<?php
include('../db_con.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $company_name = $_POST['company_name'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    $status = $_POST['status'];
    $date = date('Y-m-d');
    $sequence_number = $_POST['sequence_number'];

    // Insert the client feedback
    $sql = "INSERT INTO client_feedback (name, designation, company_name, rating, feedback, status, date, sequence_number)
            VALUES ('$name', '$designation', '$company_name', '$rating', '$feedback', '$status', '$date', '$sequence_number')";
    
    if ($con->query($sql)) {
      
        $product_id = $con->insert_id; 

     
        $target_dir = "../project/client_uploads/";

        
        foreach ($_FILES['images']['name'] as $key => $image_name) {
            $unique_image_name = uniqid() . "_" . basename($image_name);  
            $target_file = $target_dir . $unique_image_name;

           
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

            if (in_array($file_extension, $allowed_extensions)) {
               
                if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                    echo "Uploaded file: " . $unique_image_name . "<br>";
                  
                    $con->query("INSERT INTO client_feedback_images (client_id, image) VALUES ('$product_id', '$unique_image_name')");
                } else {
                    echo "Failed to upload file: " . $image_name . "<br>";
                }
            } else {
                echo "Invalid file extension for image: " . $image_name . "<br>";
            }
        }

     
        header('Location: client_feedback_list.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
}

$con->close();
?>
