<?php include_once('inc/header.php'); ?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">

<?php 
$sql = "SELECT posts.*, categories.name,categories.id as cid , posts.id as pid 
FROM posts
INNER JOIN categories ON posts.category_id = categories.id  ORDER BY posts.id DESC LIMIT 5";

$result_list = $db->select($sql);


if ($result_list) {
    while ($row = mysqli_fetch_assoc($result_list)) { 

      // var_dump($row);
      // die();
?>



          <div class="item">
            <img src="admin/<?php echo $row['photo'] ?>" alt="">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span><?php echo $row['name'] ?></span>
                </div>
                <a href="post-details.php?slug=<?php echo $row['slug'] ?>"><h4><?php echo $row['title'] ?></h4></a>
                <ul class="post-info">
                  <li><a href="#">Admin</a></li>
                  <li><a href="#"><?php echo $hp->format_date($row['created_at']);  ?></a></li>
                </ul>
              </div>
            </div>
          </div>


          <?php }} ?>



        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->


<?php 
$sql = "SELECT posts.*, categories.name,categories.id as cid , posts.id as pid 
FROM posts
INNER JOIN categories ON posts.category_id = categories.id  ORDER BY posts.id DESC LIMIT 3";

$result_list = $db->select($sql);



?>


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">

              <?php 
                            
              if ($result_list) {
                while ($row = mysqli_fetch_assoc($result_list)) { 
                ?>

                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="admin/<?php echo $row['photo'] ?>" alt="">
                    </div>
                    <div class="down-content">
                      <span><?php echo $row['name'] ?></span>
                      <a href="post-details.php?slug=<?php echo $row['slug'] ?>"><h4><?php echo $row['title'] ?></h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#"><?php echo $hp->format_date($row['created_at']);  ?></a></li>
                      </ul>
                      <p><?php echo $row['short_description'] ?></p>
                      
                    </div>
                  </div>
                </div>

                <?php 
                            
                       }}
                ?>


                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.php">View All Posts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <?php include_once('inc/sidebar.php') ?>
          </div>
        </div>
      </div>
    </section>
<?php include_once('inc/footer.php') ?>