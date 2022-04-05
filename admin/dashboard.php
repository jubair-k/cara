<?php
    session_start();

    if(!isset($_SESSION['cara_admin']) && empty($_SESSION['cara_admin'])){
        header("location:login.html");
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
    <title>Dashboard</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="">
        </div>

        <div class="items">
            <li class="li-active"><i class="fad fa-chart-pie-alt"></i><a href="#">Dashboard</a></li>
            <li><i class="fab fa-uikit"></i><a href="#">Categories Master</a></li>
            <li><i class="fas fa-th-large"></i><a href="#">Sub Categories Master</a></li>
            <li><i class="fas fa-edit"></i><a href="#">Product Master</a></li>
            <li><i class="fab fa-cc-visa"></i><a href="#">Order Master</a></li>
            <li><i class="fas fa-hamburger"></i><a href="#">User Master</a></li>
            <li><i class="fas fa-chart-line"></i><a href="#">Contact Us</a></li>
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
                <img src="assets/images/1.jpg" alt="">
            </div>
        </div>

        <h3 class="i-name">Dashboard</h3>

        <div class="values">
            <div class="val-box">
                <i class="fas fa-users"></i>
                <div>
                    <h3>8,267</h3>
                    <span>New Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-shopping-cart"></i>
                <div>
                    <h3>200,512</h3>
                    <span>Total Orders</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-acorn"></i>
                <div>
                    <h3>215,542</h3>
                    <span>Product Sell</span>
                </div>
            </div>
            <div class="val-box">
                <i class="fas fa-dollar-sign"></i>
                <div>
                    <h3>$677.89</h3>
                    <span>This Month</span>
                </div>
            </div>
        </div>

        <div class="board">
        </div>
    </section>


    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass('active')
        })
    </script>
</body>
</html>