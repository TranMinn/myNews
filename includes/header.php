<header>
<!-- Header Start -->
    <div class="header-area">
                <div class="main-header ">
                    <div class="header-top black-bg d-none d-md-block">
                    <div class="container">
                        <div class="col-xl-12">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="header-info-left">
                                        <ul>     
                                            <li><img src="assets/img/icon/header_icon1.png" alt="">22ºc, Sunny </li>
                                            <li><img src="assets/img/icon/header_icon1.png" alt="">Monday, 19th April, 2021</li>
                                        </ul>
                                    </div>
                                    <div class="header-info-right">
                                        <ul class="header-social">    
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="header-mid d-none d-md-block">
                    <div class="container">
                            <div class="row d-flex align-items-center">
                                <!-- Logo -->
                                <div class="col-xl-3 col-lg-3 col-md-3">
                                    <div class="logo">
                                        <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-xl-9 col-lg-9 col-md-9">
                                    <div class="header-banner f-right ">
                                        <img src="assets/img/hero/header_card.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                <div class="header-bottom header-sticky">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                    <!-- sticky -->
                                        <div class="sticky-logo">
                                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                                        </div>
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-md-block">
                                        <nav>                  
                                            <ul id="navigation">    
                                                <li><a href="index.php">Home</a></li>
                                                <li><a href="#">Categories</a>
                                                    <ul class="submenu">
                                                        <li><a href="category.php?id=1">Sports</a></li>
                                                        <li><a href="category.php?id=2">Business</a></li>
                                                        <li><a href="category.php?id=4">Entertainment</a></li>
                                                        <li><a href="category.php?id=6">Politics</a></li>
                                                        <li><a href="category.php?id=3">Travel</a></li>
                                                        <li><a href="category.php?id=9">Health</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Tags</a>
                                                    <ul class="submenu">
                                                        <li><a href="tag.php?id=1">Breaking</a></li>
                                                        <li><a href="tag.php?id=2">Stay</a></li>
                                                        <li><a href="tag.php?id=3">Celebrity</a></li>
                                                        <li><a href="tag.php?id=5">Beauty</a></li>
                                                        <li><a href="tag.php?id=4">Arts</a></li>
                                                        <li><a href="tag.php?id=6">Fashion</a></li>
                                                        <li><a href="tag.php?id=13">Medicine</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="about.php">About</a></li>
                                                <li><a href="contact.php">Contact</a></li>
                                                
                                            </ul>
                                        </nav>
                                    </div>
                                </div>  

                                <?php
                                if(isset($_POST['submit'])){
                                    require "search.php";
                                }
                                ?>

                                <div class="col-xl-2 col-lg-2 col-md-4">
                                    <div class="header-right-btn f-right d-none d-lg-block">
                                        <i class="fas fa-search special-tag"></i>
                                        <div class="search-box">
                                            <form action="search.php" method = "POST">
                                                <input name = "s" type="text" placeholder="Search">
                                                <input type = "submit" value = "Search"/>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Mobile Menu -->
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-md-none"></div>
                                </div>
                            </div>
                        </div>
                </div>
                </div>
        </div>
        <!-- Header End -->
</header>