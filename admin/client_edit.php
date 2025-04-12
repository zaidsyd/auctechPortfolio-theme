<?php
$user_id = $_GET['user_id'];
include '../db_con.php';
$que = "SELECT * FROM client_feedback WHERE id = $user_id";
$res = mysqli_query($con, $que);
$row = mysqli_fetch_array($res);

$sql = "SELECT id, pro_tile FROM add_project";
$result = mysqli_query($con, $sql);
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
    .maxsize{
        margin-top:-1vh;
        font-size:12px;
    }
    .file{
        margin-top:-1vh !important;
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
                            <h4 class="card-title">Update Client Feedback</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="POST" action="client_feedback_update.php" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Name</label>
                                            <input type="text" name='name' class="form-control"
                                            value="<?php echo htmlspecialchars($row['name']); ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Designation</label>
                                            <input type="text" name="designation" class="form-control"
                                            value="<?php echo htmlspecialchars($row['designation']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Selected Website</label>
                                            
                                            <select class="form-control" name="company_name" id="project_name" required>
                                            <option value="" disabled>--Select--</option>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row2 = mysqli_fetch_assoc($result)) {
                                                    $selected = ($row2['id'] == $row['company_name']) ? "selected" : ""; // Check if this project is selected
                                                    echo "<option value='" . $row2['id'] . "' $selected>" . $row2['pro_tile'] . "</option>";
                                                }
                                            } else {
                                                echo "<option disabled>No Project found</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Rating</label>
                                            
                                            <input type="text" name='rating' class="form-control"
                                            value="<?php echo htmlspecialchars($row['rating']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Feedback</label>
                                            <textarea type="text" name='feedback' class="form-control mt-3" rows='3'
                                                placeholder="Enter Client Feedback..."><?php echo htmlspecialchars($row['feedback']); ?></textarea>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Pic <span class="text-primary">(Resolution:200 ×
                                                    200)</span></label>
                                            <p class="maxsize">(Maxsize: 91.6 KB)</p>
                                            <input type="hidden" name="project_id" class="form-control"
                                                value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <input type="file" name="images[]" class="form-control file" id="image" multiple
                                                >
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Select Status</label>
                                            <select class="form-control" name="status" id="type" required>
                                                <option value="" disabled>Select</option>
                                                <option value="1"
                                                    <?php echo ($row['status'] == '1') ? 'selected' : ''; ?>>Publish
                                                </option>
                                                <option value="0"
                                                    <?php echo ($row['status'] == '0') ? 'selected' : ''; ?>>Unpublish
                                                </option>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input type="date" name="date" class="form-control"
                                            value="<?php echo htmlspecialchars($row['date']); ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Sequence Number</label>
                                            <input type="number" name="sequence_number" class="form-control"
                                            value="<?php echo htmlspecialchars($row['sequence_number']); ?>">
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