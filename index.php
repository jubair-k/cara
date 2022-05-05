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
    <title>Cara</title>
</head>
<body>
    <section id="header">
        <a href="#"><img src="assets/images/logo.png" class="logo" alt=""></a>
        
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li id="lg-bag"><a href="cart.html"><i class="fal fa-shopping-bag"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
        </div>
        
        <div id="mobile">
            <a href="cart.html"><i class="fal fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>

        </div>
    
    </section>

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
                            <a href="sproduct.html?prkeyv=<?php echo md5($value->id) ?>">
                                <div class="pro">
                                    <img src="media/products/<?php echo $value->image ?>" alt="">
                                    <div class="des">
                                        <h5 class="pr_name"><?php echo $value->product_name ?></h5>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4><strike><?php echo "$".$value->mrp ?></strike> &nbsp; <?php echo $value->price ?></h4>
                                        <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                    </div>
                                </div>
                            </a>
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
                            <a href="sproduct.html?prkeyv=<?php echo md5($value->id) ?>">
                                <div class="pro">
                                    <img src="media/products/<?php echo $value->image ?>" alt="">
                                    <div class="des">
                                    <h5 class="pr_name"><?php echo $value->product_name ?></h5>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4><strike><?php echo "$".$value->mrp ?></strike> &nbsp; <?php echo $value->price ?></h4>
                                        <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                    </div>
                                </div>
                            </a>
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

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="assets/images/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address: </strong> 562 Wellington Road, Street 32, San Francisco</p>
            <p><strong>Phone: </strong> +01 2222 265 /(+91) 01 2345 5789</p>
            <p><strong>Hours: </strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Doogle Play</p>
            <div class="row">
                <img src="assets/images/pay/app.jpg" alt="">
                <img src="assets/images/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gatways</p>
            <img src="assets/images/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p>&copy; 2021, Cara shoping website</p>
        </div>
    </footer>


    <script src="assets/js/script.js"></script>
</body>
</html>