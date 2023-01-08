<?php

session_start();

if(isset($_SESSION["username"])){

  header("Location:post.php");
}




?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="">
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->


                <?php
                include "db_connect.php";
                if(isset($_POST['login'])){
                  if(empty($_POST['username']) || empty($_POST['password'])){
                    echo "<div class='alert alert-danger'>All Fields must be entered</div>";

                  }
                  else{
                    $userName=mysqli_real_escape_string($con,$_POST['username']);
                    $password=mysqli_real_escape_string($con,md5($_POST['password']));

                     $sql="select user_id,username,role from user where username= '{$userName}' and password='{$password}'";

                     $result=mysqli_query($con,$sql) or die("Query Failed");

                     if(mysqli_num_rows($result) > 0){
                     while($row = mysqli_fetch_array($result)){
                       session_start();
                       $_SESSION["id"]=$row['user_id'];
                       $_SESSION["username"]=$row['username'];

                       $_SESSION["role"]=$row['role'];

                       header("Location:post.php");
                  }



                      }else{
                          echo "<div class='alert alert-danger'>UserName and Password are not matched</div>";
                      }

                         }

}
?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
