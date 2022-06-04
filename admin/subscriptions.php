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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/subscriptions.css">
    <title>Subscriptions</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="">
        </div>

        <div class="items">
            <a href="dashboard.php"><i class="fad fa-chart-pie-alt"></i><span>Dashboard</span></a>
            <a href="categories.php" ><i class="fab fa-uikit"></i><span>Categories Master</span></a>
            <a href="sub-categories.php"><i class="fas fa-th-large"></i><span>Sub Categories Master</span></a>
            <a href="seasons.php"><i class="fas fa-edit"></i><span>Seasons Master</span></a>
            <a href="product.php"><i class="fas fa-edit"></i><span>Product Master</span></a>
            <a href="subscriptions.php" class="li-active"><i class="fab fa-cc-visa"></i><span>Subscriptions</span></a>
            <a href="messages.php"><i class="fas fa-hamburger"></i><span>Messages</span></a>
            <a href=""><i class="fas fa-chart-line"></i><span>Contact Us</span></a>
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
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>

        <div class="interface_header">
            <h3 class="i-name">Categories</h3>
            <button id="addcategoriesBtn">Add Categories</button>
        </div>

        <form class="board" id="addctegories_form">
            <label for="">Categories</label>
            <input type="text" placeholder="Enter categories name" id="categoriesname" autocomplete="off" required>
            <span class="exist_alert"></span>
            <input type="submit" class="submit" value="Submit">
        </form>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Mails</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="categories_tbody">

                </tbody>
            </table>
        </div>
    </section>


    <script>
        $(document).ready(function(){
            $('#menu-btn').click(function(){
                $('#menu').toggleClass('active')
            })

            $('.logot_popup_btn').click(function(){
                $('.logout_popup_wraper').toggleClass('logout_popup_active')
            })


            $('#addcategoriesBtn').click(function(){
                $('#addctegories_form').slideToggle('slow');
            })

        })
    </script>
</body>
</html>