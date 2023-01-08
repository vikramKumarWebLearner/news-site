<?php 
include "header.php"; 
 include_once("db_connect.php");
  if(isset($_POST['save'])){
       $category_name=$_POST["cat"];
     $sql="insert into category(category_name) values ('$category_name')";
      
      $result=mysqli_query($con,$sql);
    
    if($result){
      header("location:category.php");
    }
    else{
      echo "Query Failed!";
    }

  }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
