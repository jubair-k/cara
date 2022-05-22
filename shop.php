<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/shop.css">
    <title>Cara</title>
</head>
<body id="page2">
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

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates our about out latest shop and <span>special offers</span></p>  
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <?php include "footer.php"; ?>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/shop.js"></script>
</body>
</html>