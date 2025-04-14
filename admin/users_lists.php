<?php include 'check_session.php' ?>
<?php include 'header.php' ?>
<?php include 'side_menu.php' ?>
<div class="content-body">
   <div class="container-fluid">
      <!-- row -->
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Users Lists</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table header-border table-responsive-sm">
                     <thead>
                        <tr style="text-align:center;">
                           <th>S.No.</th>
                           <th>Firstname</th>
                           <th>Lastname</th>
                           <th>Username</th>
                           <th>Email</th>
                           <!-- <th>Register_as</th> -->
                           <!-- <th>Suggestions</th> -->
                           <th>Status</th>
                           <th>Last Login</th>
                           <th>Game wallet</th>
                           <th>Task wallet</th>
                           <th colspan="2">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           include 'db_con.php';
                           
                           $sel_que="select*from add_user";// where condition after make login
                           $res=mysqli_query($con, $sel_que);
                           $i=1;
                           while ($row=mysqli_fetch_array($res))
                           {
                               ?>
                        <tr>
                           <td><?php echo $i;?></td>
                           <td><?php echo $row['firstname'];?></td>
                           <td><?php echo $row['lastname'];?></td>
                           <td><?php echo $row['username'];?></td>
                           <td><?php echo $row['email'];?></td>
                           <!-- <td><?php echo $row['register'];?></td> -->
                           <td><?php echo $row['ACC_STATUS'];?></td>
                           <td><?php echo $row['LAST_LOGIN'];?></td>
                          
                           <!-- <td>NA</td> -->
                           <td><?php echo $row['game_wallet'];?></td>
                           <td><?php echo $row['task_wallet'];?></td>
                           <td><a type="submit" class="btn btn-primary shadow btn-xs sharp me-1" href="user_edit.php?user_id=<?php echo $row['user_id']; ?>" style="color:white;"><i class="fas fa-pencil-alt"></i></a></td>
                           <td>
                              <form method="POST" action="user_dlt.php">
                                 <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
                                 <button type="submit" class="btn btn-danger shadow btn-xs sharp"name="delete" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></button>
                              </form>
                           </td>
                        </tr>
                     </tbody>
                     <?php
                        $i++;
                        }
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php' ?>