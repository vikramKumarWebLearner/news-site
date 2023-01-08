<?php
  error_reporting(0);
  if($_SESSION['role']== '0'){
   header("Location:post.php");
}
  include "db_connect.php";
  $user_id=$_GET['id'];

  $sql= "delete from user where user_id='$user_id'";
  
  if(mysqli_query($con,$sql)){
     header("Location: users.php");
  }else{
  	echo '<p style="color:red; margin:10px 0px">Can\'t Delete the User Record</p>';
  }

mysqli_close($con);
?>