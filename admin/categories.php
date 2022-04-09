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
    <link rel="stylesheet" href="assets/css/categories.css">
    <title>Categories</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="">
        </div>

        <div class="items">
            <a href="dashboard.php"><i class="fad fa-chart-pie-alt"></i><span>Dashboard</span></a>
            <a href="categories.php" class="li-active"><i class="fab fa-uikit"></i><span>Categories Master</span></a>
            <a href=""><i class="fas fa-th-large"></i><span>Sub Categories Master</span></a>
            <a href=""><i class="fas fa-edit"></i><span>Product Master</span></a>
            <a href=""><i class="fab fa-cc-visa"></i><span>Order Master</span></a>
            <a href=""><i class="fas fa-hamburger"></i><span>User Master</span></a>
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
            <input type="text" placeholder="Enter categories name" id="categoriesname" require>
            <span class="exist_alert"></span>
            <input type="submit" class="submit" value="Submit">
        </form>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Categories</td>
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

            function loadCategories(){
                let formData = new FormData();
                formData.append('loadCategories','post');
                fetch('assets/process/categories-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    console.log(data);
                    trs="";
                    for (const row of data.categs) {
                        trs+=`<tr>
                                <td>${row.categories}</td>
                            </tr>
                        `
                    }
                    $('.categories_tbody').html(trs);
                })
            }

            loadCategories();

            $('#addctegories_form').on('submit',function(){
                event.preventDefault();
                if($('#categoriesname').val()!=""){
                    let formData = new FormData();
                    formData.append('addCategories','post');
                    formData.append('categname',$('#categoriesname').val())
                    fetch('assets/process/categories-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="ok"){
                            $('#categoriesname').val('');
                        }

                        if(data.exist){
                            $('.exist_alert').text(data.exist);
                        }
                        else{
                            $('.exist_alert').text("");
                        }
                    })
                }
            })


        })
    </script>
</body>
</html>