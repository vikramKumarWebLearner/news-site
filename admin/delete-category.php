<?php
include "db_connect.php";
$category_id=$_GET['id'];

$sql="delete from category where category_id={$category_id}";

$query=mysqli_query($con,$sql);

if($query){
  header("Location:category.php");
}else{
	echo "Query Falid!";
}

mysqli_close($con);

?>