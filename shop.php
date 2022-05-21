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
            <ul class="filter_categories">
                <li>
                    <label>
                        <input type="checkbox" value="Man"  name="category[]" class="category_filt">
                        Shirt
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" value="Man"  name="category[]" class="category_filt">
                        T-Shirt
                    </label>
                </li>
                <li>
                    <label>
                        <input type="checkbox" value="Man"  name="category[]" class="category_filt">
                        Pants
                    </label>
                </li>
            </ul>

        </div>

        <div id="interface">
            <div class="filter_nav_wraper">
                <div class="filter_nav">
                    <!-- <i id="filter-menu-btn" class="fas fa-bars"></i> -->
                    <div id="filterNavLg">=</div>
                    <div id="filterNavMd">:::</div>

                    <select name="sortby" id="sortby">
                        <option value="">Sort By</option>
                        <option value="">Newest</option>
                        <option value="">Price: Low to High</option>
                        <option value="">Price: High to Low</option>
                    </select>
                </div>
            </div>

            <div class="pro-container" id="proContainer">
            </div>
        </div>

    </section>

    <section id="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
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