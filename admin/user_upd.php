<?php
if(isset($_POST['update']))
{
    include 'db_con.php';
 extract($_POST);
 $user_id=$_POST['user_id'];
 
 //$s_no =$_POST['s_no'];
 $upd_que="UPDATE add_user SET firstname ='$firstname',lastname ='$lastname',username ='$username',email ='$email',register='$register',ACC_STATUS='$acc_status',suggestion='$suggestion',password='$password',confirm_password ='$confirm_password' where user_id ='$user_id'";
 mysqli_query($con,$upd_que);

?>

<script>
    alert('Data updated successfully!');
    window.location='users_lists.php';
</script>

<?php
}
else
{
    header('location:users_lists.php');
}
?>