<?php include 'check_session.php' ?>
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
    label {
        display: none;
        margin-bottom: 0.5rem;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: rgb(108 108 112);
        font-weight: 500;
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
                            <h4 class="card-title">Queries List</h4>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table id="example" class="table header-border table-responsive-sm table-bordered"
                                style="width: 100%; border-collapse: collapse; border: 1px solid gray;">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../db_con.php');
                                        $fetch_query = "SELECT * FROM queries";
                                        $result = mysqli_query($con, $fetch_query);
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['mobile']; ?></td>
                                        <?php  
                                            $project_id = $row['project_id'];  // Fetch project ID from current row
                                            $projctname_query = "SELECT pro_tile FROM add_project WHERE id = $project_id"; 
                                            $projctname_result = mysqli_query($con, $projctname_query);
                                            
                                            if ($projctname_result) {
                                                $projctname_data = mysqli_fetch_assoc($projctname_result);
                                                echo "<td>" . $projctname_data['pro_tile'] . "</td>";
                                            } else {
                                                echo "<td>Error fetching project</td>";
                                            }
                                            ?>
                                       

                                        <td>
                                        <form method="POST" action="contact_dlt.php">
                                            <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">
                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"name="delete" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></button>
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
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->
    <?php
            include('footer.php');
        ?>