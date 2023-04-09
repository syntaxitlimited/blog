<?php include_once('inc/header.php') ?>
<?php include_once('inc/sidebar.php') ?>


<?php 

$title = $photo = $short_descroption = $description = $status = $category_id = $message = '';
$title_err = $photo_err = $short_descroption_err = $description_err = $status_err = $category_id_err = '';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['title'] != '') {
      $title = $db->verify($_POST['title']);
    }else{
      $title_err = "Title Field is required";
    }

    if ($_POST['category_id'] != '') {
      $category_id = $db->verify($_POST['category_id']);
    }else{
      $category_id_err = "Category Field is required";
    }

    if ($_POST['short_description'] != '') {
      $short_description = $db->verify($_POST['short_description']);
    }else{
      $short_description_err = "Short Description Field is required";
    }

    if ($_POST['description'] != '') {
      $description = $db->verify($_POST['description']);
    }else{
      $description_err = "Description Field is required";
    }

    if ($_FILES['photo']['name'] != '') {
      $filename = $_FILES['photo']['name'];
      $temp_name = $_FILES['photo']['tmp_name'];
      $photo = 'uploads/'.$filename;
      move_uploaded_file($temp_name,$photo);
    }else{
        $photo_err = "Photo is required";
    }
    
    if ($_POST['status'] != '') {
        $status = $db->verify($_POST['status']);
      }else{
        $status_err = "Status Field is required";
      }


    $slug = $hp->make_slug($title);
  
  
  
  
    if ($title && $category_id &&  $short_description && $description && $photo) {
      
        $sql = "INSERT INTO posts (title,category_id,short_description,description,photo,status,slug) VALUES ('$title','$category_id','$short_description','$description' ,'$photo' ,'$status','$slug')";
        $result = $db->insert($sql);

        if ($result) {
            Session::set('message' , 'Post Insert Success');
            ?>
                <script>
                    window.location.href = "all_post.php";
                </script>
            <?php
          }else{
            Session::set('message' , 'Post Insert failed');
            $message = 'Post Insert failed';
          }
    }
  
  
  
  }

//   Select All Category 
$sql = "SELECT * FROM categories";
$result_list = $db->select($sql);

?>
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('inc/navbar.php') ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <a href='all_post.php' class="text-light au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>All Posts</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row m-t-25">
                            <div class="col-lg-12">
                                    <form action="" method='POST' enctype='multipart/form-data'>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Post Create</strong>
                                            </div>

                                            <div class="card-body">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Post Title</label>
                                                    <input type="text" required name='title' id="inputIsValid" class="is-valid form-control-success form-control">
                                                </div>
                                            </div>


                                            <div class="card-body">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Category</label>
                                                    <select class="is-valid  form-control" name="category_id" required id="status">

                                                    <option value="">Select Category</option>


                                                    <?php 
                                                    if ($result_list) {
                                                        while ($row = mysqli_fetch_assoc($result_list)) { 
                                                    ?>

                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="card-body">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Photo</label>
                                                    <input type="file" required name='photo' id="inputIsValid" class="is-valid  form-control">
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Short Description</label>
                                                    <textarea class='form-control' name="short_description" id="short_description" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>

                                            
                                            <div class="card-body">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Description</label>
                                                    <textarea class='form-control' name="description" id="description" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>

                                            <div class="card-body ">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Category Status</label>

                                                    <select class="is-valid  form-control" name="status" required id="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">InActive</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>

                       
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'description' );
    </script>
<?php include_once('inc/footer.php') ?>
