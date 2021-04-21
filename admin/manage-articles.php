<?php

include '../consume.php';

session_start();
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
    session_destroy();
    header('location:index.php');
}
else{

    // Delete article
    if($_GET['action']='del'){

        // Get ID of the article
        $id = intval($_GET['id']);
        // Resource Address
        $url = "http://localhost:8088/myNews/api/article/delete.php?id=$id";

        $data = consume($url);

    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>AZ News | Manage Articles</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/header.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/sidebar.php');?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manage Articles </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">Articles</a>
                                        </li>
                                        <li class="active">
                                            Manage Articles  
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                         

                                    <div class="table-responsive">
                                        <table class="table table-colored table-centered table-inverse m-0">
                                            <thead>

                                                <tr>                                      
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Tag</th>
                                                <th>Author</th>
                                                <th>Date created</th>
                                                <th>Action</th>
                                                </tr>

                                        </thead>
                                        <tbody>

                                            <?php 

                                            // Get all Articles
                                            $url = "http://localhost:8088/myNews/api/article/read.php";
                                            $data = consume($url);
                                            
                                            for($i = 0; $i < count($data); $i++){ ?>

                                            <tr>
                                                <td><b><?php echo htmlentities($data[$i]['title']);?></b></td>
                                                <td><img src="../articleImages/<?php echo htmlentities($data[$i]['image']);?>" width = "100px" height = "100px"></td>
                                                <td><?php echo htmlentities($data[$i]['category_name']);?></td>
                                                <td><?php echo htmlentities($data[$i]['tag_name']);?></td>
                                                <td><?php echo htmlentities($data[$i]['author']);?></td>
                                                <td><?php echo htmlentities($data[$i]['date_created']);?></td>

                                                <td><a href="edit-article.php?id=<?php echo htmlentities($data[$i]['id']);?>">
                                                <i class="fa fa-pencil" style="color: #29b6f6;"></i></a> 
                                                &nbsp;<a href="manage-articles.php?id=<?php echo htmlentities($data[$i]['id']);?>&&action=del" onclick="return confirm('Do you really want to delete ?')"> 
                                                <i class="fa fa-trash-o" style="color: #f05050;"></i></a> </td>
                                            </tr>

                                            <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div> <!-- container -->

                </div> <!-- content -->

                    <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
		<script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>

<?php } ?>