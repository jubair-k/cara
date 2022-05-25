<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sproduct.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Cara</title>
</head>

<body id="page2">
    <?php include "header.php"; ?>
    <div class="breadcrumb section-p1">
        <a href="index.php">Home</a> / <a href="shop.php">Shop</a> / <span id="productSubCateg"></span>
    </div>

    <section id="prodetails" class="section-p1">
        <div class="single-pro-image" id="imgContainer">
            <!-- <img src="media/products/f1.jpg" width="100%" id="mainImg" alt=""> -->
        </div>

        <div class="single-pro-details" id="productDetails">
            <!-- <h4>Men's Fashion T Shirt</h4>
            <h2>$139.00</h2>
            <select>
                <option>Select Size</option>
                <option>XL</option>
                <option>XXL</option>
                <option>Sall</option>
                <option>Large</option>
            </select>
            <input type="number" value="1">
            <button class="normal">Add To Cart</button>
            <h4>Product Details</h4>
            <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate harum dolorem molestias vero nihil
                officia nobis aliquam nulla facilis quo illum in dolor minima tenetur voluptatum debitis, incidunt
                dignissimos? Beatae suscipit quo autem qui. Veritatis maxime officia ipsum assumenda blanditiis aut
                corrupti optio impedit illo beatae ad?</span> -->
        </div>
    </section>

    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Morden Design</p>
        <div class="pro-container">
            <div class="pro">
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
            </div>
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

    <!-- <script src="assets/js/script.js"></script> -->
    <script src="assets/js/sproduct.js"></script>
</body>

</html>