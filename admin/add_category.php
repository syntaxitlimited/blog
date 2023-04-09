<?php include_once('inc/header.php') ?>
<?php include_once('inc/sidebar.php') ?>


<?php 

$name = $name_err = $status = $status_err = $message =  '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['name'] != '') {
      $name = $db->verify($_POST['name']);
    }else{
      $name_err = "Name Field is required";
    }

    if ($_POST['status'] != '') {
      $status = $db->verify($_POST['status']);
    }else{
      $status_err = "Status Field is required";
    }

    $slug = $hp->make_slug($name);
  
  
  
  
    if ($name ) {
      
        $sql = "INSERT INTO categories (name,status,slug) VALUES ('$name','$status','$slug')";
        $result = $db->insert($sql);

        if ($result) {
            Session::set('message' , 'Category Insert Success');
            ?>
                <script>
                    window.location.href = "all_category.php";
                </script>
            <?php
          }else{
            Session::set('message' , 'Category Insert failed');
            $message = 'Category Insert failed';
          }
    }
  
  
  
  }

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
                                    <a href='all_category.php' class="text-light au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>All Category</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row m-t-25">
                            <div class="col-lg-12">
                                    <form action="" method='POST'>
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Category Create</strong>
                                            </div>
                                            <div class="card-body">
                                                <div class="has-success form-group">
                                                    <label for="inputIsValid" class=" form-control-label">Category Name</label>
                                                    <input type="text" required name='name' id="inputIsValid" class="is-valid form-control-success form-control">
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
<?php include_once('inc/footer.php') ?>
