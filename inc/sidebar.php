<?php 
$sql = "SELECT posts.*, categories.name,categories.id as cid , posts.id as pid 
FROM posts
INNER JOIN categories ON posts.category_id = categories.id  ORDER BY posts.id DESC LIMIT 3";

$result_list = $db->select($sql);


?>

<div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>

                      <?php 
                        if ($result_list) {
                            while ($row = mysqli_fetch_assoc($result_list)) { 
                        ?>


                        <li><a href="post-details.php?slug=<?php echo $row['slug'] ?>">
                          <h5><?php echo $row['title'] ?></h5>
                          <span><?php echo $hp->format_date($row['created_at']);  ?></span>
                        </a></li>
                        <?php }} ?>
                      </ul>
                    </div>
                  </div>
                </div>              
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php 
                      $sql = "SELECT * FROM categories";
                      $result_list = $db->select($sql);
                        if ($result_list) {
                            while ($category = mysqli_fetch_assoc($result_list)) { 
                        ?>
                        <li><a href="category-posts.php?id=<?php echo $category['id'] ?>">- <?php echo $category['name'] ?></a></li>
                        <?php }} ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            