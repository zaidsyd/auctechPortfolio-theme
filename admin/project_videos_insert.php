<?php
include('../db_con.php');

if (isset($_POST['submit'])) {
    $project_id = $_POST['project_name'];

    if (!empty($_FILES['thumbnail']['name'][0]) && !empty($_POST['url'][0])) {
        $uploadDir = "../project/thumbnails/";  // Make sure this directory exists

        foreach ($_FILES['thumbnail']['name'] as $key => $name) {
            $tmpName = $_FILES['thumbnail']['tmp_name'][$key];
            $thumbnailName = time() . "_" . basename($name);
            $targetFilePath = $uploadDir . $thumbnailName;
            $url = $_POST['url'][$key];

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $sql = "INSERT INTO banner_videos (project_id, thumbnail, url) VALUES ('$project_id', '$thumbnailName', '$url')";
                mysqli_query($con, $sql);
            }
        }

         header('location:video_list.php');
    } else {
        echo "Please select at least one thumbnail and provide a URL.";
    }
}
?>