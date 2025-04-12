<?php
include '../db_con.php';

if (isset($_POST['client_id']) && isset($_POST['status'])) {
    $client_id = intval($_POST['client_id']);
    $status = intval($_POST['status']);  

   
    $update_query = "UPDATE client_feedback SET status = $status WHERE id = $client_id";
    
    if ($con->query($update_query)) {
        echo json_encode(['status' => 'success', 'message' => 'Status updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update status']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
}
?>
