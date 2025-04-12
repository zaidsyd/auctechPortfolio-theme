<?php
if(isset($_POST['delete']))
{
   include '../db_con.php';
   $video_id =$_POST['video_id'];

   $del_que ="delete from banner_videos where id =$video_id";
   mysqli_query($con,$del_que);

?>

<script>
    alert('Video deleted successfully!');
    window.location='video_list.php';
</script>

<?php
}
else
{
    header('location:video_list.php');
}
?>