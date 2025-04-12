<?php
include '../db_con.php';

$query = "SELECT COUNT(*) AS count FROM add_project WHERE feature_status = 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

echo json_encode(['count' => $row['count']]);
?>
