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
                            $i = 0;
                            while ($row = mysqli_fetch_assoc($result_list)) { 
                                $i++;
                        ?>


                        <li><a href="post-details.html">
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
                        <li><a href="#">- Nature Lifestyle</a></li>
                        <li><a href="#">- Awesome Layouts</a></li>
                        <li><a href="#">- Creative Ideas</a></li>
                        <li><a href="#">- Responsive Templates</a></li>
                        <li><a href="#">- HTML5 / CSS3 Templates</a></li>
                        <li><a href="#">- Creative &amp; Unique</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">HTML5</a></li>
                        <li><a href="#">Inspiration</a></li>
                        <li><a href="#">Motivation</a></li>
                        <li><a href="#">PSD</a></li>
                        <li><a href="#">Responsive</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>