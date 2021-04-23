<?php

include 'consume.php';

// Resource Address
$url = "http://localhost:8088/myNews/api/article/read.php";

$data = consume($url);

?>


<!-- Trending Area Start -->
<div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    <li class="news-item"><?php echo htmlentities($data[0]['title']);?></li>
                                    <li class="news-item"><?php echo htmlentities($data[1]['title']);?></li>
                                    <li class="news-item"><?php echo htmlentities($data[2]['title']);?></li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">

                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="articleImages/<?php echo htmlentities($data[0]['image']);?>" height = "500px">
                                <div class="trend-top-cap">
                                    <span><?php echo htmlentities($data[0]['category_name']);?></span>
                                    <h2><a href="article_details.php?id=<?php echo htmlentities($data[0]['id'])?>"><?php echo htmlentities($data[0]['title']);?></a></h2>
                                </div>
                            </div>
                        </div>

                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">

                            <?php for($i = 1; $i < 4; $i++){ ?>

                                <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="articleImages/<?php echo htmlentities($data[$i]['image']);?>" height="150px">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1"><?php echo htmlentities($data[$i]['category_name']);?></span>
                                        <h4><a href="article_details.php?id=<?php echo htmlentities($data[$i]['id'])?>"><?php echo htmlentities($data[$i]['title']);?></a></h4>
                                    </div>
                                </div>
                                </div>

                            <?php } ?>

                            </div>
                        </div>
                    </div>

                    <!-- Right content -->
                    <div class="col-lg-4">

                        <?php for($i = 4; $i < 9; $i++){ ?>

                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="articleImages/<?php echo htmlentities($data[$i]['image']);?>" width="200px" height="150px">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1"><?php echo htmlentities($data[$i]['tag_name']);?></span>
                                    <h6><a href="article_details.php?id=<?php echo htmlentities($data[$i]['id'])?>"><?php echo htmlentities($data[$i]['title']);?></a></h6>
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
</div>
    <!-- Trending Area End -->

    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
           <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            
                        <?php for($i = 9; $i < 15; $i++){ ?>

                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="articleImages/<?php echo htmlentities($data[$i]['image']);?>" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1"><?php echo htmlentities($data[$i]['category_name']);?></span>
                                    <h4><a href="article_details.php?id=<?php echo htmlentities($data[$i]['id'])?>"><?php echo htmlentities($data[$i]['title']);?></a></h4>
                                </div>
                            </div> 

                        <?php } ?>   

                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>           
    <!-- End Weekly-News -->


    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Whats New</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav>                                                                     
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Entertainment</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Business</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Sports</a>
                                    <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Politics</a>
                                    <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Style</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                <div class="whats-news-caption">
                                    <div class="row">

                                    <?php
                                    $urle = "http://localhost:8088/myNews/api/article/get_by_cat.php?c_id=4";
                                    $en = consume($urle);

                                    for($i = 0; $i < 4; $i++){?>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="articleImages/<?php echo htmlentities($en[$i]['image']);?>" width = "250px" height = "250px">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1"><?php echo htmlentities($en[$i]['category_name']);?></span>
                                                    <h4><a href="article_details.php?id=<?php echo htmlentities($en[$i]['id'])?>"><?php echo htmlentities($en[$i]['title']);?></a></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }?>

                                    </div>
                                </div>
                            </div>

                            <!-- Card two -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="whats-news-caption">
                                    <div class="row">

                                    <?php
                                    $urlb = "http://localhost:8088/myNews/api/article/get_by_cat.php?c_id=2";
                                    $b = consume($urlb);

                                    for($i = 0; $i < 4; $i++){?>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="articleImages/<?php echo htmlentities($b[$i]['image']);?>" width = "250px" height = "250px">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1"><?php echo htmlentities($b[$i]['category_name']);?></span>
                                                    <h4><a href="article_details.php?id=<?php echo htmlentities($b[$i]['id'])?>"><?php echo htmlentities($b[$i]['title']);?></a></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }?>
  
                                    </div>
                                </div>
                            </div>
                            <!-- card Three -->
                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                <div class="whats-news-caption">
                                    <div class="row">

                                        <?php
                                        $urlsp = "http://localhost:8088/myNews/api/article/get_by_cat.php?c_id=1";
                                        $sp = consume($urlsp);

                                        for($i = 0; $i < 4; $i++){?>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="articleImages/<?php echo htmlentities($sp[$i]['image']);?>" width = "250px" height = "250px">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1"><?php echo htmlentities($sp[$i]['category_name']);?></span>
                                                        <h4><a href="article_details.php?id=<?php echo htmlentities($sp[$i]['id'])?>"><?php echo htmlentities($sp[$i]['title']);?></a></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- card Five -->
                            <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                <div class="whats-news-caption">
                                    <div class="row">

                                        <?php
                                        $urlp = "http://localhost:8088/myNews/api/article/get_by_cat.php?c_id=6";
                                        $p = consume($urlp);

                                        for($i = 0; $i < 4; $i++){?>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-what-news mb-100">
                                                    <div class="what-img">
                                                        <img src="articleImages/<?php echo htmlentities($p[$i]['image']);?>" width = "250px" height = "250px">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1"><?php echo htmlentities($p[$i]['category_name']);?></span>
                                                        <h4><a href="article_details.php?id=<?php echo htmlentities($p[$i]['id'])?>"><?php echo htmlentities($p[$i]['title']);?></a></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php }?>
                                    </div>
                                </div>
                            </div>
                            <!-- card Six -->
                            <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                                <div class="whats-news-caption">
                                    <div class="row">
                                            
                                        <?php
                                            $urlst = "http://localhost:8088/myNews/api/article/get_by_cat.php?c_id=5";
                                            $st = consume($urlst);

                                            for($i = 0; $i < 4; $i++){?>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="articleImages/<?php echo htmlentities($st[$i]['image']);?>" width = "250px" height = "250px">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1"><?php echo htmlentities($st[$i]['category_name']);?></span>
                                                            <h4><a href="article_details.php?id=<?php echo htmlentities($st[$i]['id'])?>"><?php echo htmlentities($st[$i]['title']);?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End Nav Card -->
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
                <!-- New Poster -->
                <div class="news-poster d-none d-lg-block">
                    <img src="assets/img/news/news_card.jpg" alt="">
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
