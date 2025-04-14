<?php
include '../db_con.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['project_id']) && isset($data['feature_status'])) {
    $project_id = $data['project_id'];
    $feature_status = $data['feature_status'];

    // Using prepared statements to avoid SQL injection
    $update_query = "UPDATE add_project SET feature_status = ? WHERE id = ?";
    
    if ($stmt = $con->prepare($update_query)) {
        // Bind parameters to the query
        $stmt->bind_param('ii', $feature_status, $project_id);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => $con->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Missing project_id or feature_status']);
}
?>
