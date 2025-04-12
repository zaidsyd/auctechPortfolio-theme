<?php
if (isset($_POST['submit'])) {
    include '../db_con.php';

    $year = $_POST['year'];
    $sql = "INSERT INTO add_year_master (year) VALUES ('$year')";

    if (mysqli_query($con, $sql)) {
        header('Location: year_master_list.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
