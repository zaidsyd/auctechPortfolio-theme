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
                               <form method="POST" action="project_videos_insert.php" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label>Select Project</label>
                                            <select class="form-control" name="project_name" id="project_name" required>
                                                <option value="" disabled selected>--Select--</option>
                                                <?php
                                                include('../db_con.php');
                                                $sql = "SELECT id, pro_tile FROM add_project";
                                                $result = mysqli_query($con, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='" . $row['id'] . "'>" . $row['pro_tile'] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option disabled>No Project found</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div id="video-container">
                                        <div class="form-row video-row">
                                            <div class="form-group col-md-4">
                                                <label>Choose Thumbnail <span class="text-primary">(Size: 1894 × 840)</span></label>
                                                <input type="file" name='thumbnail[]' class="form-control file" required>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Add URL</label>
                                                <input type="text" name='url[]' class="form-control" placeholder="Enter URL" required>
                                            </div>
                                            <div class="form-group col-md-1 d-flex align-items-end">
                                                <button type="button" class="btn btn-success add-row">+</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    $(document).ready(function () {
        $(".add-row").click(function () {
            var newRow = `<div class="form-row video-row">
                <div class="form-group col-md-4">
                    <input type="file" name='thumbnail[]' class="form-control file" required>
                </div>
                <div class="form-group col-md-5">
                    <input type="text" name='url[]' class="form-control" placeholder="Enter URL" required>
                </div>
                <div class="form-group col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-row">-</button>
                </div>
            </div>`;
            $("#video-container").append(newRow);
        });

        $(document).on("click", ".remove-row", function () {
            $(this).closest(".video-row").remove();
        });
    });
</script>

    <!--**********************************
            Footer start
        ***********************************-->
    <?php
            include('footer.php');
        ?>