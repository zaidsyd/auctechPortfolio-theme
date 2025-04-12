<?php
include '../db_con.php';

// Check if the necessary POST data is available
if(isset($_POST['project_id']) && isset($_POST['king_status'])) {
    $projectId = $_POST['project_id'];
    $kingStatus = $_POST['king_status']; // 1 for active, 0 for inactive

    // Update the king_status in the database
    $updateQuery = "UPDATE add_project SET king_status = ? WHERE id = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param("ii", $kingStatus, $projectId); // Bind the parameters
    if($stmt->execute()) {
        echo 'success'; // Return success response
    } else {
        echo 'error'; // Return error response
    }
}
?>
