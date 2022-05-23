<?php
    require "functions.php";
    // echo "<pre>";
    // print_r($newArr);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <title>Cara</title>
</head>
<body id="page1">
    <?php include "header.php"; ?>

    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>super value deals</h2>
        <h1>On all products</h1>
        <p>save more with coupons 7 up to 70% off!</p>
        <button>Shop Now</button>
    </section>

    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="assets/images/features/f1.png" alt="">
            <h6>Free Shipping</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f2.png" alt="">
            <h6>Online Order</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f3.png" alt="">
            <h6>Save Money</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f4.png" alt="">
            <h6>Promortions</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f5.png" alt="">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f6.png" alt="">
            <h6>7 Support</h6>
        </div>
    </section>

    <?php
        $bestArr=beastSeller();
        if(!empty($bestArr)){
            ?>
            <section id="product1" class="section-p1">
                <h2>Best Sellers</h2>
                <p>Summer Collection New Morden Design</p>
                <div class="pro-container">
                    <?php
                        foreach ($bestArr as $value) {
                            ?>
                            <div class="pro" onclick="window.location.href='sproduct.html?prkeyv=<?php echo $value->id; ?>'">
                                <img src="media/products/<?php echo $value->image; ?>" alt="">
                                <div class="des">
                                    <h5 class="pr_name"><?php echo $value->product_name; ?></h5>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4><strike><?php echo "$".$value->mrp; ?></strike> &nbsp; <?php echo $value->price; ?></h4>
                                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </section>
            <?php
        }
    ?>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> All t-Shirts & Accessories</h2>
        <button class="normal">Explore More</button>
    </section>

    <?php
        $newArr=newArrivels();
        if(!empty($newArr)){
            ?>
            <section id="product1" class="section-p1">
                <h2>New Arrivals</h2>
                <p>Winter Collection New Morden Design</p>
                <div class="pro-container">
                    <?php
                        foreach ($newArr as $value) {
                            ?>
                            <div class="pro" onclick="window.location.href='sproduct.html?prkeyv=<?php echo $value->id; ?>'">
                                <img src="media/products/<?php echo $value->image; ?>" alt="">
                                <div class="des">
                                <h5 class="pr_name"><?php echo $value->product_name; ?></h5>
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4><strike><?php echo "$".$value->mrp; ?></strike> &nbsp; <?php echo $value->price; ?></h4>
                                    <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </section>
            <?php
        }
    ?>

    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic dress is on sale at care</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic dress is on sale at care</span>
            <button class="white">Collections</button>
        </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collections</h3>
        </div>
        <div class="banner-box banner-box2">
            <h2>NEW FOOTWEAR COLLECTION</h2>
            <h3>spring/summer 2022</h3>
        </div>
        <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New Treandy Prints</h3>
        </div>

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
</body>
</html>