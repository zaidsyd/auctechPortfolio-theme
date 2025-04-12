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
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: rgb(108 108 112);
        font-weight: 500;
    }

    label {
        display: none;
        margin-bottom: 0.5rem;
    }

    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
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
                            <h4 class="card-title">Project List</h4>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table header-border table-responsive-sm table-bordered"
                                    style="width: 100%; border-collapse: collapse; border: 1px solid gray;">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Image</th>
                                            <th>Project Name</th>
                                            <th>Project Url</th>
                                            <th>Status</th>
                                            <th class="text-center">Featured</th>
                                            <th class="text-center">King</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../db_con.php';

                                        // Fetch projects
                                        $sel_que = "SELECT * FROM add_project";
                                        $res = mysqli_query($con, $sel_que);
                                        $i = 1;

                                        while ($row = mysqli_fetch_array($res)) {
                                            $image_query = "SELECT * FROM project_image WHERE project_id = '{$row['id']}' LIMIT 1";
                                            $image_result = mysqli_query($con, $image_query);
                                            $image_row = mysqli_fetch_array($image_result);
                                            $image_path = isset($image_row['project_image']) ? $image_row['project_image'] : 'default-image.jpg'; 

                                            
                                            $status_checked = ($row['status'] == 1) ? 'checked' : '';
                                            $king_status_checked = ($row['king_status'] == 1) ? 'checked' : '';
                                            $feature_status_checked = ($row['feature_status'] == 1) ? 'checked' : '';
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><img src="../project/project_upload/<?php echo $image_path; ?>"
                                                    alt="Image" class="img-thumbnail"
                                                    style="max-width: 80px; height: auto;"></td>
                                            <td><?php echo $row['pro_tile'];?></td>
                                            <td><?php echo $row['website_urls']; ?></td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle"
                                                        data-project-id="<?php echo $row['id']; ?>"
                                                        <?php echo $status_checked; ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                         
                                            <td>
                                                <div class="custom-image-checkbox d-flex justify-content-center">
                                                    <input type="checkbox" id="feature-status-<?php echo $row['id']; ?>" 
                                                           class="feature-status-toggle" 
                                                           data-project-id="<?php echo $row['id']; ?>" 
                                                           data-feature-status="<?php echo $row['feature_status']; ?>"
                                                           <?php echo ($row['feature_status'] == 1) ? 'checked' : ''; ?> />
                                                    <label for="feature-status-<?php echo $row['id']; ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="custom-image-checkbox d-flex justify-content-center">
                                                    <input type="checkbox" id="king-status-<?php echo $row['id']; ?>" 
                                                           class="king-status-toggle" 
                                                           data-project-id="<?php echo $row['id']; ?>" 
                                                           data-king-status="<?php echo $row['king_status']; ?>"
                                                           <?php echo ($row['king_status'] == 1) ? 'checked' : ''; ?> />
                                                    <label for="king-status-<?php echo $row['id']; ?>"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary shadow btn-xs sharp me-1"
                                                    href="project_edit.php?user_id=<?php echo $row['id']; ?>"
                                                    style="color:white;">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form method="POST" action="project_dlt.php" style="display:inline;">
                                                    <input type="hidden" name="user_id"
                                                        value="<?php echo $row['id'];?>">
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp"
                                                        name="delete" onclick="return confirm('Are you sure?')">
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
<!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    
    <!-- Datatable -->
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
    
    document.querySelector('table').addEventListener('change', function(event) {
      
        if (event.target && event.target.classList.contains('status-toggle')) {
            var projectId = event.target.getAttribute('data-project-id');
            var status = event.target.checked ? 1 : 0;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_project_status.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        console.log(response.message);
                    } else {
                        console.error(response.message);
                    }
                } else {
                    console.error('Error updating status');
                }
            };

            xhr.send('project_id=' + projectId + '&status=' + status);
        }
    });
});

    </script>
    <script>
    $(document).ready(function() {
    var table = $('#example').DataTable();

    table.on('draw', function() {
        // Re-bind the event handlers after DataTable redraws the table (pagination changes)
        $('.king-status-toggle').off('change').on('change', function() {
            var projectId = $(this).data('project-id');
            var newStatus = $(this).prop('checked') ? 1 : 0;

            $.ajax({
                url: 'update_project_king_status.php',
                type: 'POST',
                data: {
                    project_id: projectId,
                    king_status: newStatus
                },
                success: function(response) {
                    if(response == 'success') {
                        alert('King Status updated successfully!');
                    } else {
                        alert('Error updating King Status!');
                    }
                }
            });
        });

        
    });
});

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
           
            const tableBody = document.querySelector('tbody');

            tableBody.addEventListener('change', function(e) {
                if (e.target && e.target.classList.contains('feature-status-toggle')) {
                    const checkbox = e.target;
                    const projectId = checkbox.getAttribute('data-project-id');
                    const featureStatus = checkbox.checked ? 1 : 0; 

                  
                    fetch('update_project_feature_status.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            project_id: projectId,
                            feature_status: featureStatus
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            //console.log('Feature status updated.');
                             alert('Feature status updated.');
                        } else {
                            alert('Failed to update feature status.');
                           
                            checkbox.checked = !checkbox.checked;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('There was an error updating the feature status.');
                        
                        checkbox.checked = !checkbox.checked;
                    });
                }
            });
        });

    </script>


</body>

</html>