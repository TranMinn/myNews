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

    if(isset($_POST['update'])){
        
        $id = intval($_GET['id']);
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $cat = $_POST['category'];
        $tag = $_POST['tag'];
    
        // Get submitted image file
        if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'];
        }

        // The path to store uploaded image
        $target = "../articleImages/".basename($_FILES['image']['name']);

        $form_data = array(
            'title' => $title,
            'intro' => $intro,
            'author' => $author,
            'content' => $content,
            'cate_id' => $cat,
            'tag_id' => $tag,
            'image' => $image,
            'id' => $id
        );

        $api_url = "http://localhost:8088/myNews/api/article/update.php";

        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_URL, $api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($form_data));
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);

    if($e = curl_error($client)){
        $error = "Update failed!!!";
    }else{
        $response = json_decode($response, true);
        
        // Move uploaded image to folder articleImages
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg = "Update successfully";

            // Move to manage-articles page
            echo "<script type='text/javascript'> window.location.href = 'manage-articles.php'; </script>";
        }else{
            $error = "Update failed";
        }
    }

    curl_close($client);

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
        <title>AZ News | Edit Article</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
            <!-- Left Sidebar End -->



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
                                    <h4 class="page-title">Edit Article </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#"> Article </a>
                                        </li>
                                        <li class="active">
                                            Edit Article
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>

    <!-- Get info of the article -->
    <?php

    // Get ID of the article
    $id = intval($_GET['id']);

    // Resource Address
    $url = "http://localhost:8088/myNews/api/article/read_one.php?id=$id";

    $data = consume($url);
    
    // print_r($data);

    ?>

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form action = "edit-article.php?id=<?php echo htmlentities($id)?>" method="POST" enctype="multipart/form-data">

                                        
        <div class="form-group m-b-20">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="title" value="<?php echo htmlentities($data['title']);?>" name="title" placeholder="Enter title" required>
        </div>



        <div class="form-group m-b-20">
            <label for="exampleInputEmail1">Category</label>
            <select class="form-control" name="category" id="category" required>
            <option value="<?php echo htmlentities($data['cate_id']);?>"><?php echo htmlentities($data['category_name']);?></option>

            <!-- Category options -->
                <?php 
                
                $url_cat = "http://localhost:8088/myNews/api/category/read.php";
                
            
                $cate = consume($url_cat);
                
                for($i = 0; $i < count($cate); $i++){ ?>

                    <option value="<?php echo htmlentities($cate[$i]['id']);?>"><?php echo htmlentities($cate[$i]['name']);?></option>

                <?php } ?>

            </select>  
        </div>
            
        <div class="form-group m-b-20">
            <label for="exampleInputEmail1">Tag</label>
                <select class="form-control" name="tag" id="tag" required>
                <option value="<?php echo htmlentities($data['tag_id']);?>"><?php echo htmlentities($data['tag_name']);?></option>
                    <!-- Tag options -->
                    <?php 

                    $url_tag = "http://localhost:8088/myNews/api/tag/read.php";
                    $tag = consume($url_tag);
                    
                    for($i = 0; $i < count($tag); $i++){ ?>

                    <option value="<?php echo htmlentities($tag[$i]['id']);?>"><?php echo htmlentities($tag[$i]['name']);?></option>
                
                    <?php } ?>

                </select>  
        </div>

        <div class="form-group m-b-20">
            <label for="exampleInputEmail1">Author</label>
            <input type="text" class="form-control" id="author" value="<?php echo htmlentities($data['author']);?>" name="author" placeholder="Enter author" required>
        </div>
                
        <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Introduction</b></h4>
                        <textarea class="summernote" name="intro" required><?php echo htmlentities($data['intro']);?></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="m-b-30 m-t-0 header-title"><b>Article Content</b></h4>
                        <textarea class="summernote" name="content" required><?php echo htmlentities($data['content']);?></textarea>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-b-30 m-t-0 header-title"><b>Image</b></h4>
                    <img src="../articleImages/<?php echo htmlentities($data['image']);?>" width="300"/>
                    <br />
                    <p>Update Image</p>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
        </div>




<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>

                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>
</html>

<?php } ?>
