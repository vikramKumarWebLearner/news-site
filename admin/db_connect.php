<?php
  $server_name="localhost";
  $user_name="root";
  $user_password="";
  $database_name="news-site";

  $con=mysqli_connect($server_name,$user_name,$user_password,$database_name,"3308") or die("Connection Falid".mysqli_connect_error());



?>