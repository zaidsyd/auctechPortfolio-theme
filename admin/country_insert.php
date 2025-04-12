<?php
if (isset($_POST['submit'])) {
    include '../db_con.php';

    $country_name = $_POST['country_name'];
    $sql = "INSERT INTO add_country (country_name) VALUES ('$country_name')";

    if (mysqli_query($con, $sql)) {
        header('Location: country_list.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
