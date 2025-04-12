<?php include 'check_session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    label {
        color: #302f2f;
        font-weight: bold;
    }

    .form-control {
        background: #fff;
        border: 1px solid #cbc3c3;
        color: #454545;
        padding: 0.3rem 0.7rem;
    }
    .maxsize{
        margin-top:1vh;
        font-size:12px;
    }
    .file{
        margin-top:1vh !important;
    }
    </style>
</head>

<body>
    <?php
include('../db_con.php');

$selected_project_id = isset($_GET['project_id']) ? $_GET['project_id'] : ''; // Get project ID from URL

$sql = "SELECT id, pro_tile FROM add_project";
$result = mysqli_query($con, $sql);
?>
        <?php
            include('header.php');
        ?>
    <!--**********************************
            Sidebar end
        ***********************************-->

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body" style="background:#93938a29">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-xxl-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-black">Add Videos</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="basic-form">
                              <form method="POST" action="project_videos_update.php" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md-3">
            <label>Select Project</label>
            <select class="form-control" name="project_name" id="project_name" required>
    <option value="" disabled>--Select--</option>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $selected = ($row['id'] == $selected_project_id) ? "selected" : ""; // Check if this project is selected
            echo "<option value='" . $row['id'] . "' $selected>" . $row['pro_tile'] . "</option>";
        }
    } else {
        echo "<option disabled>No Project found</option>";
    }
    ?>
</select>
        </div>
    </div>

    <div id="video-container">
        <?php
        if (isset($_GET['project_id'])) {
            $project_id = $_GET['project_id'];
            $query = "SELECT * FROM banner_videos WHERE project_id = $project_id";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="form-row video-row">
                        <input type="hidden" name="video_id[]" value="<?php echo $row['id']; ?>">
                        
                        <div class="form-group col-md-4">
                            <label>Current Thumbnail</label><br>
                            <img src="../project/thumbnails/<?php echo $row['thumbnail']; ?>" width="100">
                            <input type="file" name="thumbnail[]" class="form-control file">
                            <input type="hidden" name="old_thumbnail[]" value="<?php echo $row['thumbnail']; ?>">
                        </div>

                        <div class="form-group col-md-5">
                            <label>Update URL</label>
                            <input type="text" name="url[]" class="form-control" value="<?php echo $row['url']; ?>" required>
                        </div>

                        <div class="form-group col-md-1 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-row">-</button>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No videos found for this project.</p>";
            }
        }
        ?>
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on("click", ".remove-row", function () {
        $(this).closest(".video-row").remove();
    });
</script>
    <!--**********************************
            Footer start
        ***********************************-->
    <?php
            include('footer.php');
        ?>