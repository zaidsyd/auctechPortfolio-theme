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

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
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
                            <h4 class="card-title">Client Feedback List</h4>
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
                                            <th>Name</th>
                                            <th>Feedback</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../db_con.php';

                                        // Fetch all projects
                                        $sel_que = "SELECT * FROM client_feedback";
                                        $res = mysqli_query($con, $sel_que);
                                        $i = 1;

                                        while ($row = mysqli_fetch_array($res)) {
                                        
                                        $image_query = "SELECT * FROM client_feedback_images WHERE client_id = '{$row['id']}'";
                                        $image_result = mysqli_query($con, $image_query);

                                       
                                        $image_paths = [];
                                        while ($image_row = mysqli_fetch_array($image_result)) {
                                            if (isset($image_row['image']) && $image_row['image'] != '') {
                                              
                                                $image_paths[] = '../project/client_uploads/' . $image_row['image'];
                                            }
                                        }

                                           
                                            if (empty($image_paths)) {
                                                $image_paths[] = 'client_uploads/default-image.jpg';
                                            }
                                            $status_checked = ($row['status'] == 1) ? 'checked' : '';
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <!-- Display all images for this project -->
                                                <?php foreach ($image_paths as $image_path): ?>
                                                <img src="<?php echo $image_path; ?>" alt="Image" class="img-thumbnail"
                                                    style="max-width: 80px; height: auto;">
                                                <?php endforeach; ?>
                                            </td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['feedback']; ?></td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="status-toggle"
                                                        data-client-id="<?php echo $row['id']; ?>"
                                                        <?php echo $status_checked; ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <a type="submit" class="btn btn-primary shadow btn-xs sharp me-1"
                                                    href="client_edit.php?user_id=<?php echo $row['id']; ?>"
                                                    style="color:white;">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form method="POST" action="client_dlt.php" style="display:inline;">
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
<script>
    document.querySelectorAll('.status-toggle').forEach(function(toggle) {
    toggle.addEventListener('change', function() {
        var clientId = this.getAttribute('data-client-id');
        var status = this.checked ? 1 : 0; // 1 for Active, 0 for Inactive

        // Send the status change request via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_client_status.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Handle server response
        xhr.onload = function() {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    console.log(response.message); // Success message
                    alert(response.message); // Optional: Show success message
                } else {
                    console.error(response.message); // Log error message
                    alert(response.message); // Optional: Show error message
                }
            } else {
                console.error('Request failed with status ' + xhr.status); // Request failure
            }
        };

        // Send the client_id and the new status to the server
        xhr.send('client_id=' + clientId + '&status=' + status);
    });
});

</script>


</body>

</html>