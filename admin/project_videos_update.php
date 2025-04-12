<?php
include('../db_con.php');

if (isset($_POST['update'])) {
    $project_id = $_POST['project_name'];

    foreach ($_POST['video_id'] as $key => $video_id) {
        $url = $_POST['url'][$key];
        $old_thumbnail = $_POST['old_thumbnail'][$key];

        if (!empty($_FILES['thumbnail']['name'][$key])) {
            // Upload new thumbnail
            $uploadDir = "../project/thumbnails/";
            $thumbnailName = time() . "_" . basename($_FILES['thumbnail']['name'][$key]);
            $targetFilePath = $uploadDir . $thumbnailName;
            move_uploaded_file($_FILES['thumbnail']['tmp_name'][$key], $targetFilePath);
            
            // Remove old file if a new one is uploaded
            if (file_exists($uploadDir . $old_thumbnail)) {
                unlink($uploadDir . $old_thumbnail);
            }
        } else {
            // Keep the old thumbnail if no new one is uploaded
            $thumbnailName = $old_thumbnail;
        }

        // Update query
        $sql = "UPDATE banner_videos SET url = '$url', thumbnail = '$thumbnailName' WHERE id = '$video_id' AND project_id = '$project_id'";
        mysqli_query($con, $sql);
    }

     header('location:video_list.php');
}
?>