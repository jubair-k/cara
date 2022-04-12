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
    <link rel="stylesheet" href="assets/css/seasons.css">
    <title>Seasons</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="">
        </div>

        <div class="items">
            <a href="dashboard.php"><i class="fad fa-chart-pie-alt"></i><span>Dashboard</span></a>
            <a href="categories.php"><i class="fab fa-uikit"></i><span>Categories Master</span></a>
            <a href="sub-categories.php"><i class="fas fa-th-large"></i><span>Sub Categories Master</span></a>
            <a href="seasons.php" class="li-active"><i class="fas fa-edit"></i><span>Seasons Master</span></a>
            <a href="product.php"><i class="fas fa-edit"></i><span>Product Master</span></a>
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


    <script>
        $(document).ready(function(){
            $('#menu-btn').click(function(){
                $('#menu').toggleClass('active')
            })

            $('.logot_popup_btn').click(function(){
                $('.logout_popup_wraper').toggleClass('logout_popup_active')
            })


            $('#addseasonsBtn').click(function(){
                $('#addseasons_form').slideToggle('slow');
            })

            function loadSeasons(){
                let formData = new FormData();
                formData.append('loadSeasons','post');
                fetch('assets/process/seasons-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    trs="";
                    for (const row of data.sesns) {
                        trs+=`<tr data-id="${row.id}">
                                <td>${row.season}</td>`
                        if(row.status=='1'){
                            stbtn=`<button class="status_active stbtn">Active</button>`
                        }else{
                            stbtn=`<button class="status_deactive stbtn">Deactive</button>`
                        }


                        trs+=`<td class="operate_td">${stbtn} <button class="edite_sesn">Edit</button> <button class="delete_sesn">Delete</button></td>
                            </tr>
                        `
                    }
                    $('.seasons_tbody').html(trs);
                })
            }

            loadSeasons();

            $('#addseasons_form').on('submit',function(){
                event.preventDefault();
                if($('#seasonsname').val()!=""){
                    if($('.submit').val()=="Submit"){
                        let formData = new FormData();
                        formData.append('addSeason','post');
                        formData.append('sesnname',$('#seasonsname').val())
                        fetch('assets/process/seasons-process.php', {
                            method: 'post',
                            body: formData,
                        })
                        .then( res => res.json())
                        .then( data => {
                            //console.log(data);
                            if(data=="ok"){
                                $('#seasonsname').val('');
                                loadSeasons()
                            }

                            if(data.exist){
                                $('.exist_alert').text(data.exist);
                            }
                            else{
                                $('.exist_alert').text("");
                            }
                        })
                    }

                    if($('.submit').val()=="Save"){
                        let formData = new FormData();
                        formData.append('saveSeasons','post');
                        formData.append('sesnsavename',$('#seasonsname').val())
                        formData.append('sesnsave',sesnedit_id)
                        fetch('assets/process/seasons-process.php', {
                            method: 'post',
                            body: formData,
                        })
                        .then( res => res.json())
                        .then( data => {
                            //console.log(data);
                            if(data=="ok"){
                                $('#seasonsname').val('');
                                loadSeasons()
                                $('#addseasons_form').slideUp('fast');
                                $('.submit').val('Submit')
                            }

                            if(data.exist){
                                $('.exist_alert').text(data.exist);
                            }
                            else{
                                $('.exist_alert').text("");
                            }
                        })
                    }
                }
            })

            $('body').on('click','.delete_sesn',function(){
                sesn_id=this.parentElement.parentElement.dataset.id;
                let formData = new FormData();
                formData.append('deletesesn','post');
                formData.append('sesn',sesn_id)
                fetch('assets/process/seasons-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    if(data=="success"){
                        loadSeasons()
                    }
                })
            })

            $('body').on('click','.stbtn',function(){
                if(this.classList.contains('status_active')){
                    sesn_id=this.parentElement.parentElement.dataset.id;
                    let formData = new FormData();
                    formData.append('deactivesesn','post');
                    formData.append('sesn',sesn_id)
                    fetch('assets/process/seasons-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="success"){
                            loadSeasons()
                        }
                    })
                }

                if(this.classList.contains('status_deactive')){
                    sesn_id=this.parentElement.parentElement.dataset.id;
                    let formData = new FormData();
                    formData.append('activesesn','post');
                    formData.append('sesn',sesn_id)
                    fetch('assets/process/seasons-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="success"){
                            loadSeasons()
                        }
                    })
                }
            })

            $('body').on('click','.edite_sesn',function(){
                sesnedit_id=this.parentElement.parentElement.dataset.id
                $('#addseasons_form').slideDown('fast');
                $('#seasonsname').val(this.parentElement.parentElement.children[0].textContent)
                $('.submit').val('Save')
            })



        })
    </script>
</body>
</html>