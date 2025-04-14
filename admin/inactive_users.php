<?php include 'check_session.php' ?>


<?php include 'header.php' ?>
<?php include 'side_menu.php' ?>

    <div class="content-body">
            <div class="container-fluid">
                 <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Inactive Blocked Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>firstname</th>
                                                <th>lastname</th>
                                                <th>username</th>
                                                <th>email</th>
                                                <th>register_as</th>
                                                <th>suggestions</th>
                                                <th>Status</th>
                                                <th>type</th>
                                                <th>game_wallet</th>
                                                <th>task_wallet</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                include('db_con.php');
                                                $sel_que = "SELECT * from add_user WHERE ACC_STATUS='deactive' AND TYPE='USER' GROUP BY s_no DESC";
                                                $res = mysqli_query($con, $sel_que);
                                                $a = 0;
                                                while ($row = mysqli_fetch_array($res)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['firstname']; ?></td>
                                                        <td><?php echo $row['lastname']; ?></td>
                                                        <td><?php echo $row['username']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['register']; ?></td>
                                                        <td><?php echo $row['suggestion']; ?></td>
                                                        <td><span class="badge badge-success"><?php echo $row['ACC_STATUS']; ?></span></td>
                                                        <td><?php echo $row['TYPE']; ?></td>
                                                        <td><?php echo $row['game_wallet']; ?></td>
                                                        <td><?php echo $row['task_wallet']; ?></td>
                                                        <td><button class="activate-button btn btn-danger" data-userid="<?php echo $row['s_no']; ?>">Activated</button></td>
                                                    </tr>
                                                <?php
                                                    $a = $a + 1;
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


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $(".activate-button").click(function () {
            var userId = $(this).data("userid");

            // Send an AJAX request to update the user's activation status
            $.ajax({
                url: "activate_user.php", // Replace with the actual PHP script to handle the activation
                type: "POST",
                data: { userId: userId },
                success: function (response) {
                    alert('activation is successful!');
    window.location='users_lists.php';
                },
                error: function (xhr, status, error) {
                    // Handle errors here
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>


                
<?php include 'footer.php' ?>