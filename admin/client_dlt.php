<?php
if(isset($_POST['delete']))
{
   include '../db_con.php';
   $user_id =$_POST['user_id'];

   $del_que ="delete from client_feedback where id =$user_id";
   mysqli_query($con,$del_que);

?>

<script>
    alert('Data deleted successfully!');
    window.location='client_feedback_list.php';
</script>

<?php
}
else
{
    header('location:client_feedback_list.php');
}
?>



