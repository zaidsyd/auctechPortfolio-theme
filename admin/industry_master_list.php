<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Auctech Portfolio | Admin Dashboard </title>
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
                                <h4 class="card-title">Indutry Master List</h4>
                            </div>
                            <hr>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table header-border table-responsive-sm table-bordered" style="width: 100%; border-collapse: collapse; border: 1px solid gray;">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Industry Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../db_con.php');
                                        $fetch_query = "SELECT * FROM add_industry_master";
                                        $result = mysqli_query($con, $fetch_query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>                                       
                                        <td><?php echo $row['industry_name']; ?></td>                                       
                                        <td>
                                            <a type="submit" class="btn btn-primary shadow btn-xs sharp me-1" href="industry_master_edit.php?user_id=<?php echo $row['id']; ?>" style="color:white;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form method="POST" action="industry_master_dlt.php" style="display:inline;">
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
        <div class="footer">
            <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank" class="text-warning">Auctech Marcom</a> 2024</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    
    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>

</body>

</html>