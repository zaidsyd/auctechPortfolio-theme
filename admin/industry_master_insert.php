<?php
if (isset($_POST['submit'])) {
    include '../db_con.php';

    $industry_name = $_POST['industry_name'];
    $sql = "INSERT INTO add_industry_master (industry_name) VALUES ('$industry_name')";

    if (mysqli_query($con, $sql)) {
        header('Location: industry_master_list.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
