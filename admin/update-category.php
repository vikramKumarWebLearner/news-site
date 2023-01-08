<?php
  include "db_connect.php";
 include "header.php";
if($_SESSION['role']== '0'){
   header("Location:post.php");
}
   if(isset($_POST['sumbit'])){
      $sql1="update category set category_name='{$_POST["cat_name"]}' where category_id={$_POST['cat_id']}";
       $result=mysqli_query($con,$sql1);
  
      if($result){
         header("location:category.php");
      }
      else{
          echo "Query Falid!";
      }
   }
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php  
                  include "db_connect.php";
                    $cat_id=$_GET['id'];
                   $sql= "select *from category where category_id={$cat_id}";
                     $query=mysqli_query($con,$sql);
                     if(mysqli_num_rows($query) > 0){
                        while($row = mysqli_fetch_array($query)){

                ?>
                  <form action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>

            <?php

                        }
                     }

            ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
