<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Datatable -->
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .table {
                width: 100%;
                margin-bottom: 1rem;
                color:rgb(108 108 112);
                font-weight: 500;
            }
           
            label {
                display: none;
                margin-bottom: 0.5rem;
            }

        </style>
</head>

<body>

        <?php
            include('header.php');
        ?>
        <!--**********************************
            Nav header end
        ***********************************-->
        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="background:#93938a29">
            <div class="container-fluid">
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Banner List</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table header-border table-responsive-sm table-bordered" style="width: 100%; border-collapse: collapse; border: 1px solid gray;">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../db_con.php');
                                        $fetch_query = "SELECT * FROM add_banner";
                                        $result = mysqli_query($con, $fetch_query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><img src="<?php echo $row['image_path']; ?>" alt="Image" class="img-thumbnail" style="max-width: 80px; height: auto;"></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['details']; ?></td>
                                        
                                        <td>
                                            <a type="submit" class="btn btn-primary shadow btn-xs sharp me-1" href="banner_edit.php?user_id=<?php echo $row['id']; ?>" style="color:white;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form method="POST" action="banner_delete.php" style="display:inline;">
                                                <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
                                                <button type="submit" class="btn btn-danger shadow btn-xs sharp" name="delete" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
                                        }
                                    ?>
                                </tbody>
                                </table>
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