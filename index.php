<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
    <?php
   include "config.php";
   $limit=3;
               
               if(isset($_GET['page'])){
                 $page=$_GET['page'];
               }else{
                     $page=1;
               }
               $offset= ($page - 1) * $limit;
         $sql= "select *from post left join category on post.category = category.category_id left join user on post.author=user.user_id order by post.post_id desc limit {$offset},{$limit}"; 

         $result=mysqli_query($con,$sql) or die("Query Failed!");
              if(mysqli_num_rows($result) > 0){ 
                while($row =mysqli_fetch_array($result)){


    ?>

                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img'];?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo $row['post_id'];?>'><?php echo $row['title'];?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?id=<?php echo $row['category_id']; ?>'><?php echo $row['category_name'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['author'];?>'><?php echo $row['author'];?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date'];?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($row['description'],0,130)."...";?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
          <?php  
        }
                }else{
                  echo "<h2>No Record Found!";
                 }
                 
                  
                  $sql1="select *from post";
                  $result1=mysqli_query($con,$sql1) or die("Query Falied");
                  if(mysqli_num_rows($result1) > 0){
                       $total_records=mysqli_num_rows($result1);
                       
                       $totalPage=ceil($total_records/$limit);
                       echo "<ul class='pagination'>";
                       if($page > 1){
                           echo '<li><a >Prev</a></li>';
                           //href="index.php"
                           //?page="'.($page - 1).'
                       }                      
                     for($i=1; $i<= $totalPage; $i++){
                        if($i == $page){
                              $active="active";
                        }else{
                            $active='';
                        }
                        echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                     }
                    if($totalPage > $page){
                           echo '<li><a >Next</a></li>';
                           //href="index.php"
                           //?page="'.($page + 1).'
                       }
                     echo "</ul>"; 
                  }
                  ?>
                    </div><!-- /post-container -->

                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
