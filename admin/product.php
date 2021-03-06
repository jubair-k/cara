<?php
    session_start();

    if(!isset($_SESSION['cara_admin']) && empty($_SESSION['cara_admin'])){
        header("location:index.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/preloader.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/datatable/responsive.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/product.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <title>Product</title>
</head>
<body>
    <div class="container" id="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <section id="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="">
        </div>

        <div class="items">
        <a href="dashboard.php"><i class="fad fa-chart-pie-alt"></i><span>Dashboard</span></a>
            <a href="categories.php" ><i class="fab fa-uikit"></i><span>Categories Master</span></a>
            <a href="sub-categories.php"><i class="fas fa-th-large"></i><span>Sub Categories Master</span></a>
            <a href="seasons.php"><i class="far fa-clouds-sun"></i><span>Seasons Master</span></a>
            <a href="product.php" class="li-active"><i class="fab fa-product-hunt"></i><span>Product Master</span></a>
            <a href="subscriptions.php"><i class="fal fa-mail-bulk"></i><span>Subscriptions</span></a>
            <a href="messages.php"><i class="far fa-comment-alt-dots"></i><span>Messages</span></a>
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class="fas fa-bars"></i>
                </div>
                <div class="search">
                    <i class="far fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="profile">
                <i class="far fa-bell"></i>
                <img class="logot_popup_btn" src="assets/images/1.jpg" alt="">
                <div class="logout_popup_wraper">
                    <a href="logout.php">Logout <i class="fal fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>

        <div class="interface_header">
            <h3 class="i-name">Products</h3>
            <button class="green_buttons" id="addproductBtn">Add Product</button>
        </div>

        <form class="board" id="addproduct_form">
            <div class="form_group">
                <label for="">Categories</label>
                <select name="categoriesId" id="categoriesId" required>
                </select>
            </div>

            <div class="form_group">
                <label for="">Sub Categories</label>
                <select name="sub_categoriesId" id="sub_categoriesId" required>
                    <option value>Select sub categories</option>
                </select>
            </div>

            <div class="form_group">
                <label for="">Season</label>
                <select name="seasonId" id="seasonId">
                    <option value>Select season</option>
                </select>
            </div>

            <div class="form_group">
                <label for="">Product Name</label>
                <input type="text" placeholder="Enter Product Name" name="prdctname" id="prdctname" autocomplete="off" required>
                <span class="exist_alert"></span>
            </div>

            <div class="form_group">
                <label for="">Best Seller</label>
                <select name="best_seller" id="best_seller">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <div class="form_group">
                <label for="">MRP</label>
                <input type="number" placeholder="Enter Product MRP" name="prdctmrp" id="prdctmrp" autocomplete="off" required>
            </div>

            <div class="form_group">
                <label for="">Price</label>
                <input type="number" placeholder="Enter Product Price" name="prdctprice" id="prdctprice" autocomplete="off" required>
            </div>

            <div class="form_group">
                <label for="">Offer</label>
                <input type="number" placeholder="Enter Product Offer in %" name="prdctOffer" id="prdctOffer" autocomplete="off" >
            </div>

            <div class="form_group">
                <label for="">Offer Expaier Date</label>
                <input type="Date" placeholder="Enter Product Brand" name="prdctofferdate" id="prdctofferdate" autocomplete="off" >
            </div>

            <div class="form_group">
                <label for="">Quantity</label>
                <input type="Number" placeholder="Enter Product Quantity" name="prdctqty" id="prdctqty" autocomplete="off" required>
            </div>

            <div class="form_group">
                <label for="">Image</label>
                <input type="File" placeholder="Upload Product Image" name="prdctimg" id="prdctimg" autocomplete="off">
                <span class="exist_alert" id="image_alert"></span>
            </div>

            <div class="form_group">
                <label for="">Description</label>
                <textarea name="prdctdescription" id="prdctdescription" placeholder="Enter Product Description" cols="30" rows="2" autocomplete="off" required></textarea>
            </div>

            <div class="form_group">
                <label for="">Meta Title</label>
                <textarea name="prdctmeta_title" id="prdctmeta_title" placeholder="Enter Product Meta Title" cols="30" rows="2" autocomplete="off" required></textarea>
            </div>

            <input type="submit" class="submit" value="Submit">
        </form>

        <div class="board productTableboard">
            <table width="100%" id="productTable" class="stripe">
                <thead>
                    <tr>
                        <td>Categories</td>
                        <td>Sub Categories</td>
                        <td>Name</td>
                        <td>Image</td>
                        <td>MRP</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td></td>
                    </tr>
                </thead>
                <!-- <tbody class="products_tbody">
                </tbody> -->
            </table>
        </div>
    </section>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/datatable/jquery-3.5.1.js"></script>
    <script src="assets/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/datatable/dataTables.responsive.min.js"></script>
    <script src="assets/js/product.js"></script>
    <script src="assets/js/preloader.js"></script>
</body>
</html>