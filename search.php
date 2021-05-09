
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>News Searched</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/ticker-style.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
   </head>

   <body>

        <!-- Preloader Start -->
        <div id="preloader-active">
                <div class="preloader d-flex align-items-center justify-content-center">
                    <div class="preloader-inner position-relative">
                        <div class="preloader-circle"></div>
                        <div class="preloader-img pere-text">
                            <img src="assets/img/logo/logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Preloader End -->

        <!-- Navigation -->
        <header>
        <?php include('includes/header.php');?>
        </header>

        <!-- Page Content -->
        <main>

            <!-- Articles Area -->
            <?php
                    include 'consume.php';
                
                    $s = $_POST['s'];

                    // Resource Address
                    $url = "http://localhost:8088/myNews/api/article/search.php?s=$s";

                    $data = consume($url);

                         for($i = 0; $i < count($data); $i++){
                            ?>
                    
                    <div class="container">
                        <div class="trending-main">
                        
                            <div class="row">
                                <div class="col-6">
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="articleImages/<?php echo htmlentities($data[$i]['image']);?>" width = "700px" height = "450px">
                                            <br></br>
                                            <div class="trend-top-cap">
                                                <span class="genric-btn danger small"><?php echo htmlentities($data[$i]['category_name']);?></span>
                                                <h2><a href="article_details.php?id=<?php echo htmlentities($data[$i]['id'])?>"><?php echo htmlentities($data[$i]['title']);?></a></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                        <?php } ?>


        </main>


        <!-- Footer -->
        <?php include('includes/footer.php');?>


    <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Breaking New Pluging -->
        <script src="./assets/js/jquery.ticker.js"></script>
        <script src="./assets/js/site.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>


   </body>

</html>
