<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <?php
                include "config.php";

                $sql = "select  *from setting";

                $result = mysqli_query($con, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {

             echo '<span>'.$row['footerdesc'].'</span>';

              }

            }
                 ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
