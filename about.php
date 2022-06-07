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
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Cara</title>
</head>

<body id="page3">
    <div class="container" id="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <?php include "header.php"; ?>

    <section id="page-header" class="about-header">
        <h2>#Know Us</h2>
        <p>Lorem ipsum dolor sit amet adipisicing.</p>
    </section>

    <section id="about-head" class="section-p1">
        <img src="assets/images/about/a6.jpg" alt="">
        <div>
            <h2>Who We Are?</h2>
            <p>Founded in August 2008 and bassed in San Francisco, California, Cara is a trusted community marketplace 
                for people to list, discover, and book fashion products. WE build new products based on our customer's
                feedback. Whilst our packs are criticaly acclimed we know that thsre is always room for improvment. Having
                conversations with people  who use our products is the core of our business. We realy hope you will help us on
                our mission.
            </p>
            <abbr title="">Purchase stunning products with good quality or as littile control as you like thanks to a choise of
                Basic and Good products</abbr>
            <br><br>
            <marquee bgcolor="#ccc" loop="-1" scrollamount="5" width="" 100%>Purchase stunning products with good quality or as 
                littile control as you like thanks to a choise of Basic and Good products</marquee>
        </div>
    </section>

    <section id="about-app" class="section-p1">
        <h1>Download Our <a href="coming-soon.php">App</a></h1>
        <div class="video">
            <video autoplay muted loop src="assets/images/about/1.mp4"></video>
        </div>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="assets/images/features/f1.png">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f2.png">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f3.png">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f4.png">
            <h6>Promortions</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f5.png">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f6.png">
            <h6>7 Support</h6>
        </div>
    </section>

    <?php include "subscription.php"; ?>
    <?php include "footer.php"; ?>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/preloader.js"></script>
</body>

</html>