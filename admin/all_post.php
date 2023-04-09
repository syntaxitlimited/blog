<?php include_once('inc/header.php') ?>
<?php include_once('inc/sidebar.php') ?>


<?php 


if (isset($_GET['id'])) {

    $del_id = $_GET['id'];
    
    $sql_del = "DELETE FROM categories WHERE id = '$del_id'";
    $result_del = $db->delete($sql_del);
    
    if ($result_del) {
        Session::set('message' , 'Category Delete Success');
    } else{
        Session::set('message' , 'Category Delete failed');
    }
    
}


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

                            <?php 
                                if(Session::get('message')){ ?>

                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo Session::get('message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                             <?php   }
                            ?>
                           


                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <a href='add_category.php' class="text-light au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Add Category</a>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row m-t-25">
                            <div class="col-lg-12">

                            <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>date</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                        if ($result_list) {
                                            $i = 0;
                                            while ($row = mysqli_fetch_assoc($result_list)) { 
                                                $i++;
                                                ?>


                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['created_at'] ?></td>
                                                <td><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                <td>
                                                    <a class='btn btn-warning' href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                                                    <a onclick="return confirm('are you sure?') " class='btn btn-danger' href="?id=<?php echo $row['id'] ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
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
