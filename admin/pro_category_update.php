<?php
if (isset($_POST['submit'])) {
    // Database connection
    include '../db_con.php';

    // Get form data
    $id = $_POST['id'];
    $pro_category = $_POST['pro_category'];

    $sql = "UPDATE add_pro_master SET pro_category = '$pro_category' WHERE id = '$id'";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        header('Location: project_category_list.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
    $con->close();
}
?>

