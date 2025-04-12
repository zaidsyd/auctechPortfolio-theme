<?php
include '../db_con.php';


if (isset($_POST['project_id']) && isset($_POST['status'])) {
    $project_id = $_POST['project_id'];
    $status = $_POST['status']; 

    $update_query = "UPDATE add_project SET status = $status WHERE id = $project_id";

    if (mysqli_query($con, $update_query)) {
       
        echo json_encode(['status' => 'success', 'message' => 'Project status updated successfully']);
    } else {
        
        echo json_encode(['status' => 'error', 'message' => 'Error updating project status']);
    }
}
?>
