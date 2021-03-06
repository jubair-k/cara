<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/preloader.css">
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/css/sproduct.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
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
    <div class="breadcrumb section-p1">
        <a href="index.php">Home</a> / <a href="shop.php">Shop</a> / <span id="productSubCateg"></span>
    </div>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image" id="imgContainer">
        </div>

        <div class="single-pro-details" id="productDetails">
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container" id="sproductContainer">
            <!-- <div class="pro">
                <img src="media/products/f1.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="media/products/f2.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="media/products/f3.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            </div>
            <div class="pro">
                <img src="media/products/f4.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            </div> -->
        </div>
    </section>

    <?php include "subscription.php"; ?>
    <?php include "footer.php"; ?>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/sproduct.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/preloader.js"></script>
</body>

</html>