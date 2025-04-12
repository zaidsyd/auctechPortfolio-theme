<?php
if (isset($_POST['submit'])) {
    // Database connection
    include '../db_con.php';

    // Get form data
    $id = $_POST['id'];
    $industry_name = $_POST['industry_name'];

    $sql = "UPDATE add_industry_master SET industry_name = '$industry_name' WHERE id = '$id'";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        header('Location: industry_master_list.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
    $con->close();
}
?>

