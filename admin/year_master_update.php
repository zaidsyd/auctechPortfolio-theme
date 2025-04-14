<?php
if (isset($_POST['submit'])) {
    // Database connection
    include '../db_con.php';

    $id = $_POST['id'];
    $year = $_POST['year'];

    $sql = "UPDATE add_year_master SET year = '$year' WHERE id = '$id'";

   
    if ($con->query($sql) === TRUE) {
        header('Location: year_master_list.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
    $con->close();
}
?>

