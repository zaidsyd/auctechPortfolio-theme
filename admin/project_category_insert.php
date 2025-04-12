<?php
if (isset($_POST['submit'])) {
    include '../db_con.php';

    $pro_category = $_POST['pro_category'];
    $sql = "INSERT INTO add_pro_master (pro_category) VALUES ('$pro_category')";

    if (mysqli_query($con, $sql)) {
        header('Location: project_category_list.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
