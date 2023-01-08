<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
  <?php
  include "config.php";
  $sql="select *from post  order by post_id desc limit 5;";
   $query=mysqli_query($con,$sql);
    if(mysqli_num_rows($query) > 0){

      while($row1 = mysqli_fetch_array($query)){



   ?>
        <div class="recent-post">
          <a class="post-img" href="single.php?id=<?php echo $row1['post_id']; ?>"><img src="admin/upload/<?php echo $row1['post_img'];?>" alt=""/></a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo $row1['post_id'];?>"><?php echo substr($row1['description'],0,20);?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?id=<?php echo $row1['category'];?>'><?php echo $row1['category'];?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                  <?php echo $row1['post_date'];?>
                </span>
                <a class='read-more pull-right' href='single.php?id=<?php echo $row1['post_id'];?>'>read more</a>
            </div>
        </div>
<?php

}
}
?>


    </div>
    <!-- /recent posts box -->
</div>
