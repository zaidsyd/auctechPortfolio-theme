<?php
if (isset($_POST['submit'])) {
    // Database connection
    include '../db_con.php';

    // Get form data
    $id = $_POST['id'];
    $country_name = $_POST['country_name'];

    $sql = "UPDATE add_country SET country_name = '$country_name' WHERE id = '$id'";

    // Execute the query
    if ($con->query($sql) === TRUE) {
        header('Location: country_list.php');
        exit;
    } else {
        echo "Error: " . $con->error;
    }
    $con->close();
}
?>

