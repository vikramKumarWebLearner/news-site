<?php

include "db_connect.php";
$post_id=$_GET['id'];
$cat_id=$_GET['catid'];

$sql1 = "select *from post where post_id = {$post_id};";

$result=mysqli_query($con,$sql1);
$row=mysqli_fetch_array($result);


unlink("upload/".$row['post_img']);


$sql = "delete from post where post_id = {$post_id};";

$sql .="update category set post= post - 1 where category_id = {$cat_id}";

if(Mysqli_multi_query($con,$sql)){
	header("Location:post.php");
}
else{
	echo "Query Falid";
}



?>