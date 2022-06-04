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
    <link rel="stylesheet" href="assets/css/sub-categories.css">
    <title>Sub Categories</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <img src="assets/images/logo.png" alt="">
        </div>

        <div class="items">
            <a href="dashboard.php"><i class="fad fa-chart-pie-alt"></i><span>Dashboard</span></a>
            <a href="categories.php"><i class="fab fa-uikit"></i><span>Categories Master</span></a>
            <a href="sub-categories.php" class="li-active"><i class="fas fa-th-large"></i><span>Sub Categories Master</span></a>
            <a href="seasons.php"><i class="fas fa-edit"></i><span>Seasons Master</span></a>
            <a href="product.php"><i class="fas fa-edit"></i><span>Product Master</span></a>
            <a href="subscriptions.php"><i class="fab fa-cc-visa"></i><span>Subscriptions</span></a>
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
            <h3 class="i-name">Sub Categories</h3>
            <button class="green_buttons" id="addsubcategoriesBtn">Add Sub Categories</button>
        </div>

        <form class="board" id="addsub_ctegories_form">
            <label for="">Categories</label>
            <select name="categoriesId" id="categoriesId" required>

            </select>
            <label for="">Sub Categories</label>
            <input type="text" placeholder="Enter sub categories" id="subcategoriesname" autocomplete="off" required>
            <span class="exist_alert"></span>
            <input type="submit" class="submit" value="Submit">
        </form>

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Categories</td>
                        <td>Sub Categories</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="subcategories_tbody">

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

            $('#addsubcategoriesBtn').click(function(){
                $('#addsub_ctegories_form').slideToggle('slow');
            })

            function loadCategoriesId(){
                let formData = new FormData();
                formData.append('loadCategoriesId','post');
                fetch('assets/process/sub-categories-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    opts=`<option value>Select Categories</option>`;
                    for (const row of data.categs) {
                        opts+=`<option value="${row.id}">${row.categories}</option>`;
                    }
                    $('#categoriesId').html(opts);
                })
            }

            loadCategoriesId()

            
            function loadSubCategories(){
                let formData = new FormData();
                formData.append('loadSubCategories','post');
                fetch('assets/process/sub-categories-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    trs="";
                    for (const row of data.subcategs) {
                        trs+=`<tr data-id="${row.id}">
                                <td data-id="${row.categories_id}">${row.categories}</td>
                                <td>${row.sub_categories}</td>`
                        if(row.status=='1'){
                            stbtn=`<button class="status_active stbtn">Active</button>`
                        }else{
                            stbtn=`<button class="status_deactive stbtn">Deactive</button>`
                        }

                        trs+=`<td class="operate_td">${stbtn} <button class="edite_subcateg">Edit</button> <button class="delete_subcateg">Delete</button></td>
                            </tr>`
                    }
                    $('.subcategories_tbody').html(trs);
                })
            }

            loadSubCategories();

            $('#addsub_ctegories_form').on('submit',function(){
                event.preventDefault();
                if($('#categoriesId').val()!="" && $('#subcategoriesname').val()!=""){
                    if($('.submit').val()=="Submit"){
                        let formData = new FormData();
                        formData.append('addsubCategories','post');
                        formData.append('categselect',$('#categoriesId').val())
                        formData.append('subcategname',$('#subcategoriesname').val())
                        fetch('assets/process/sub-categories-process.php', {
                            method: 'post',
                            body: formData,
                        })
                        .then( res => res.json())
                        .then( data => {
                            //console.log(data);
                            if(data=="ok"){
                                $('#categoriesId').val('');
                                $('#subcategoriesname').val('');
                                loadSubCategories()
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
                        formData.append('saveSubcategories','post');
                        formData.append('savecategsel',$('#categoriesId').val())
                        formData.append('subcategsavename',$('#subcategoriesname').val())
                        formData.append('subcategsave',subcategedit_id)
                        fetch('assets/process/sub-categories-process.php', {
                            method: 'post',
                            body: formData,
                        })
                        .then( res => res.json())
                        .then( data => {
                            //console.log(data);
                            if(data=="ok"){
                                $('#categoriesId').val('');
                                $('#subcategoriesname').val('');
                                loadSubCategories()
                                $('#addsub_ctegories_form').slideUp('fast');
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

            $('body').on('click','.delete_subcateg',function(){
                subcateg_id=this.parentElement.parentElement.dataset.id;
                let formData = new FormData();
                formData.append('deletesubcateg','post');
                formData.append('subcateg',subcateg_id)
                fetch('assets/process/sub-categories-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    if(data=="success"){
                        loadSubCategories()
                    }
                })
            })

            $('body').on('click','.stbtn',function(){
                if(this.classList.contains('status_active')){
                    subcateg_id=this.parentElement.parentElement.dataset.id;
                    let formData = new FormData();
                    formData.append('deactivesubcateg','post');
                    formData.append('subcateg',subcateg_id)
                    fetch('assets/process/sub-categories-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="success"){
                            loadSubCategories()
                        }
                    })
                }

                if(this.classList.contains('status_deactive')){
                    subcateg_id=this.parentElement.parentElement.dataset.id;
                    let formData = new FormData();
                    formData.append('activesubcateg','post');
                    formData.append('subcateg',subcateg_id)
                    fetch('assets/process/sub-categories-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="success"){
                            loadSubCategories()
                        }
                    })
                }
            })

            $('body').on('click','.edite_subcateg',function(){
                subcategedit_id=this.parentElement.parentElement.dataset.id
                $('#addsub_ctegories_form').slideDown('fast');
                $('#subcategoriesname').val(this.parentElement.parentElement.children[1].textContent);
                $('#categoriesId').val(this.parentElement.parentElement.children[0].dataset.id);
                $('.submit').val('Save');
            })



        })
    </script>
</body>
</html>