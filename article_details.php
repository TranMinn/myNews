<?php
                            
include 'consume.php';

    // Get ID of the article
    $id = intval($_GET['id']);
    // Resource Address
    $url = "http://localhost:8088/myNews/api/article/read_one.php?id=$id";

    $data = consume($url);

    // Get Related Articles
    $c_id = $data['cate_id'];

    $url_related = "http://localhost:8088/myNews/api/article/get_related.php?c_id=$c_id&&a_id=$id";
    $related = consume($url_related);

    // Get articles comments
    $url_cmt = "http://localhost:8088/myNews/api/comment/read_article_cmt.php?a_id=$id";

    // Comment info of the article
    $comment = consume($url_cmt);

    // Post comment
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $content = $_POST['content'];
        $article_id = intval($_GET['id']);

        $form_data = array(
            'username' => $username,
            'content' => $content,
            'article_id' => $article_id
        );

        $api_url = "http://localhost:8088/myNews/api/comment/create.php";

        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_URL, $api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($form_data));
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);

        curl_close($client);

            $response = json_decode($response, true);
            echo "<script type='text/javascript'> window.location.href = 'article_details.php?id=$id'; </script>";

    }
                          
?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>News</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
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
            <link rel="stylesheet" href="assets/css/responsive.css">
   </head>

   <style>
   .prev-comments .single-item {
    background: #FFF;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    padding: 10px 20px;
    text-align: left;
    margin-bottom: 25px;

}
   
   </style>

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

    <main>
        <!-- About US Start -->
        <div class="about-area">
            <div class="container">
                   <div class="row">
                        <div class="col-lg-8">                         

                            <!-- Trending Tittle -->

                            <div class="about-right mb-90">
                                <div class="about-img">
                                    <img src="articleImages/<?php echo htmlentities($data['image']);?>" alt="">
                                </div>
                                <div class="section-tittle mb-30 pt-30">
                                    <h2><?php echo htmlentities($data['title']);?></h2>
                                    <span class="genric-btn danger circle"><?php echo htmlentities($data['tag_name'])?></span>
                                    <span class="genric-btn danger circle"><?php echo htmlentities($data['category_name'])?></span>
                                    <br></br>
                                    <h5>By <?php echo htmlentities($data['author']);?></h5>
                                    
                                    <span class="icon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                                    <span>Updated <?php echo htmlentities($data['date_created']);?></span>
                                    

                                </div>
                                <div class="about-prea">
                                    

                                    <div class="section-top-border">
                                        <h3 class="mb-30">AZ News</h3>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <blockquote class="generic-blockquote">
                                                    <?php echo htmlentities($data['intro']);?>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                            
                                    <p class="about-pera1 mb-25"><?php echo htmlentities($data['content']);?></p>
                                </div> 

                                <div class="social-share pt-30">
                                    <div class="section-tittle">
                                        <h3 class="mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a></li>
                                            <li><a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment section -->
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="form-contact contact_form mb-80" action="article_details.php?id=<?php echo htmlentities($data['id'])?>" method="POST">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <h5>Name</h5>
                                                    <input class="form-control error" name="username" id="username" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <h5>Comment</h5>
                                                    <textarea class="form-control w-100 error" name="content" id="content" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your Comment'" placeholder="Enter your Comment"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group mt-3">
                                            <button type="submit" name = "submit" class="button button-contactForm boxed-btn">Comment</button>
                                        </div>

                                    </form>

                                    <!-- Display Comments -->
                                    <div class = "prev-comments">
                                    
                                    <?php
                                    if (is_array($comment) || is_object($comment)){?>

                                        <h5>Comments(<?php echo htmlentities(count($comment));?>)</h5>

                                        <?php foreach($comment as $c){
                                        ?>

                                            <div class = "single-item">
                                                    <h6><?php echo htmlentities($c['username']);?></h6>
                                                    <small><?php echo htmlentities($c['date_created']);?></small>
                                                    <p><?php echo htmlentities($c['content']);?></p>
                                            </div>

                                        <?php }
                                        }
                                        ?>

                                    </div>

                                </div>
                        </div>


                        </div>
    
                        <div class="col-lg-4">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-40">
                                <h3>Follow Us</h3>
                            </div>
                            <!-- Flow Socail -->
                            <div class="single-follow mb-45">
                                <div class="single-box">
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">  
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div> 
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                        <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <div class="follow-social">
                                            <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                        </div>
                                        <div class="follow-count">
                                            <span>8,045</span>
                                            <p>Fans</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Articles -->

                            <div class="section-tittle mb-40">
                                <h3>Related Articles</h3>
                            </div>
                        <div class="trending-main">
                            
                            <?php

                            if (is_array($related) || is_object($related)){

                                if(count($related) >= 4){
                                      
                                    for($i = 0; $i < 4; $i++){ ?>

                                    <div class="trand-right-single d-flex" style="margin-bottom: 10px">
                                        <div class="trand-right-img">
                                            <img src="articleImages/<?php echo htmlentities($related[$i]['image']);?>" width="200px" height="150px">
                                        </div>
                                        <div class="trand-right-cap" style="padding-left:10px">
                                            <span class="genric-btn primary small"><?php echo htmlentities($related[$i]['category_name'])?></span>
                                            <h6><a href="article_details.php?id=<?php echo htmlentities($related[$i]['id'])?>"><?php echo htmlentities($related[$i]['title']);?></a></h6>
                                        </div>
                                    </div>

                                <?php }
                                }else{
                                    foreach($related as $r){ ?>

                                        <div class="trand-right-single d-flex" style="margin-bottom: 10px">
                                        <div class="trand-right-img">
                                            <img src="articleImages/<?php echo htmlentities($r['image']);?>" width="200px" height="150px">
                                        </div>
                                        <div class="trand-right-cap" style="padding-left:10px">
                                            <span class="genric-btn primary small"><?php echo htmlentities($r['category_name'])?></span>
                                            <h6><a href="article_details.php?id=<?php echo htmlentities($r['id'])?>"><?php echo htmlentities($r['title']);?></a></h6>
                                        </div>
                                    </div>

                                   <?php }
                                }
                            } ?>
                            
                        </div>
                            
                        </div>
                   </div>
            </div>
        </div>
        <!-- About US End -->
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