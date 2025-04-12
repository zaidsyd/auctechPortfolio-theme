<?php
$user_id = $_GET['user_id'];
include '../db_con.php';
$que = "SELECT * FROM add_pro_master WHERE id = $user_id";
$res = mysqli_query($con, $que);
$row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard </title>
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
                            <h4 class="card-title">Update Project Master</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="pro_category_update.php" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Project Category Name</label>
                                            <input type="text" name='pro_category' id="pro_category"
                                                class="form-control"
                                                value="<?php echo htmlspecialchars($row['pro_category']); ?>">
                                        </div>
                                        <div class="form-group col-md-6 mt-4">
                                            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
                                            <button type="submit" name="submit" class="btn btn-primary mt-1">Update</button>
                                        </div>
                                    </div>
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


    <!--**********************************
            Footer start
        ***********************************-->
    <?php
            include('footer.php');
        ?>