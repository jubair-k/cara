<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/shop.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <title>Cara</title>
</head>
<body id="page2">
    <div class="container" id="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <?php include "header.php"; ?>

    <section id="page-header">
        <h2>#stayhome</h2>
        <p>save more with coupons 7 up to 70% off!</p>
    </section>

    
    <section id="product1" class="section-p1 sectionWithFilter" >
        <!-- <div id="spinner"></div> -->
        <div class="filter_container">
            <h4>Categories</h4>
            <ul class="filter_categories" id="categories">
            </ul>

            <h4>Filter By Type</h4>
            <ul class="filter_categories" id="subcategories">
            </ul>

            <div class="filt_bts_wraper">
                <button id="resetFilter">Reset</button>
                <button id="applayFilter">Applay filter</button>
            </div>

        </div>

        <div id="interface">
            <div class="filter_nav_wraper">
                <div class="filter_nav">
                    <i id="filterNavLg" class="fas fa-outdent filter_btn"></i>
                    <i id="filterNavMd" class="fas fa-outdent filter_btn"></i>
                    <!-- <div id="filterNavLg">=</div>
                    <div id="filterNavMd">:::</div> -->

                    <select name="sortby" id="sortby">
                        <option value="0">SORT BY</option>
                        <option value="new">Newest</option>
                        <option value="low">Price: Low to High</option>
                        <option value="high">Price: High to Low</option>
                    </select>
                </div>
            </div>

            <div class="pro-container" id="proContainer">
            </div>
        </div>

    </section>

    <section id="pagination">
        <!-- <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a> -->
    </section>

    <?php include "subscription.php"; ?>
    <?php include "footer.php"; ?>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/shop.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/preloader.js"></script>
</body>
</html>