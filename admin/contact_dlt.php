<?php
if (isset($_POST['delete'])) {
    include '../db_con.php';

    $user_id = intval($_POST['user_id']); 

    // Prepare the delete query
    $del_que = "DELETE FROM contact WHERE id = $user_id";

    // Execute the delete query
    if (mysqli_query($con, $del_que)) {
        echo "<script>alert('Data deleted successfully!');</script>";
        echo "<script>window.location='contact_list.php';</script>"; 
    } else {
        echo "<script>alert('Error deleting record: " . mysqli_error($con) . "');</script>";
        echo "<script>window.location='contact_list.php';</script>";
    }
} else {
    header('Location: contact_list.php'); 
}
?>
