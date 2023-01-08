<?php 
include "header.php"; 
 if($_SESSION['role']== '0'){
   header("Location:post.php");
}
include_once"db_connect.php";
if(isset($_POST['save'])){
   $fname=mysqli_real_escape_string($con,$_POST['fname']);
   $lname=$_POST['lname'];
   $user=$_POST['user'];
   $password=md5($_POST['password']);
   $role=$_POST['role'];

     $sql="select username from user where username='{$user}'";
     
   $result=mysqli_query($con, $sql) or die("Query Failed");

   if(mysqli_num_rows($result) > 0){
     
     echo "<p style='color:red;text-align:center; margin:10px 0px;'>UserName already Exists</p>";
   }
     $sql1="insert into user(first_name,last_name,username,password,role) values('$fname','$lname','$user','$password','$role')";

   if(mysqli_query($con,$sql1)){
        header("Location:users.php");
   }

}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="Normal User">Normal User</option>
                              <option value="Admin">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
