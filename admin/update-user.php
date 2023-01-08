<?php 
include "header.php";
include_once"db_connect.php";

if($_SESSION['role']== '0'){
   header("Location:post.php");
}
if(isset($_POST['submit'])){

  $user_id=$_POST['user_id'];
   $fname=mysqli_real_escape_string($con,$_POST['fname']);
   $lname=$_POST['lname'];
   $user=$_POST['username'];
   $password=md5($_POST['password']);
   $role=$_POST['role'];

     $sql="update user set first_name='$fname',last_name='$lname',username='$user',password='$password',role='$role'  where user_id='$user_id'"; 
   if(mysqli_query($con,$sql)){
        header("Location:users.php");
   }

}
 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
              <?php
             include "db_connect.php";
              $user_id=$_GET['id'];
          $sql= "select *from user where user_id =$user_id";
              $result=mysqli_query($con,$sql) or die("Query Failed!");
              if(mysqli_num_rows($result) > 0){  
                while ($row=mysqli_fetch_array($result)) {
              ?>
                  <!-- Form Start -->
                  <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php 
                                if($row['role'] == 1){
                                  echo '<option value="0">normal User</option>
                              <option value="1" selected>Admin</option>';
                              }
                              else{
                                   echo '<option value="0" selected>normal User</option>
                              <option value="1" >Admin</option>';
                              }


                               ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->

                  <?php
                  }
                  }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
