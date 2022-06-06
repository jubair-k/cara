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
    <link rel="stylesheet" href="assets/css/seasons.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <title>Seasons</title>
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
            <a href="seasons.php" class="li-active"><i class="far fa-clouds-sun"></i><span>Seasons Master</span></a>
            <a href="product.php"><i class="fab fa-product-hunt"></i><span>Product Master</span></a>
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
            <h3 class="i-name">Seasons</h3>
            <button class="green_buttons" id="addseasonsBtn">Add Seasons</button>
        </div>

        <form class="board" id="addseasons_form">
            <label for="">Seasons</label>
            <input type="text" placeholder="Enter seasons name" id="seasonsname" autocomplete="off" required>
            <span class="exist_alert"></span>
            <input type="submit" class="submit" value="Submit">
        </form>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Seasons</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="seasons_tbody">
                </tbody>
            </table>
        </div>
    </section>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/seasons.js"></script>
</body>
</html>