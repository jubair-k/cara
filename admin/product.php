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
    <link rel="stylesheet" href="assets/css/product.css">
    <title>Product</title>
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
            <a href="seasons.php"><i class="fas fa-edit"></i><span>Seasons Master</span></a>
            <a href="product.php" class="li-active"><i class="fas fa-edit"></i><span>Product Master</span></a>
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

        <div class="board">
            <table width="100%">
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
                <tbody class="products_tbody">

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

            $('#addproductBtn').click(function(){
                $('#addproduct_form').slideToggle('slow');
            })

            function loadProducts(){
                let formData = new FormData();
                formData.append('loadProducts','post');
                fetch('assets/process/product-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    trs="";
                    for (const row of data.prdct) {
                        trs+=`<tr data-id=${row.id}>
                                <td data-cat="${row.categories_id}">${row.categories}</td>
                                <td data-subc="${row.sub_categories_id}">${row.sub_categories}</td>
                                <td>${row.product_name}</td>
                                <td><img src="../media/products/${row.image}"></td>
                                <td>${row.mrp}</td>
                                <td>${row.price}</td>
                                <td>${row.qty}</td>`
                        if(row.status=='1'){
                            stbtn=`<button class="status_active stbtn">Active</button>`
                        }else{
                            stbtn=`<button class="status_deactive stbtn">Deactive</button>`
                        }

                        trs+=`<td class="operate_td">${stbtn} <button class="edite_prdct">Edit</button> <button class="delete_prdct">Delete</button></td>
                            </tr>`
                    }
                    $('.products_tbody').html(trs);

                })
            }
            loadProducts()

            function loadCategoriesId(){
                let formData = new FormData();
                formData.append('loadCategoriesId','post');
                fetch('assets/process/product-process.php', {
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

                    sesnopts=`<option value>Select Season</option>`;
                    for (const row of data.sesn) {
                        sesnopts+=`<option value="${row.id}">${row.season}</option>`;
                    }
                    $('#seasonId').html(sesnopts);
                })
            }

            loadCategoriesId()

            $('#categoriesId').on('change',function(){
                categselect=this.value;
                let formData = new FormData();
                formData.append('loadSubCategoriesId','post');
                formData.append('categselect',categselect);
                fetch('assets/process/product-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    opts=`<option value>Select Sub Categories</option>`;
                    for (const row of data.subcategs) {
                        opts+=`<option value="${row.id}">${row.sub_categories}</option>`;
                    }
                    $('#sub_categoriesId').html(opts);
                })
            })

            $('#addproduct_form').on('submit',function(){
                event.preventDefault();
                if($('.submit').val()=="Submit"){
                    if(document.getElementById('prdctimg').files.length!=0){
                        let form=document.getElementById('addproduct_form');                
                        let formData = new FormData(form)
                        formData.append('addProducts','post');
                        fetch('assets/process/product-process.php',{
                            method: 'post',
                            body: formData,
                        })
                        .then( res => res.json())
                        .then( data => {
                            //console.log(data);
                            if(data.correct){
                                loadProducts()
                                $('.form_group input').val('');
                                $('.form_group textarea').val('');
                                $('.form_group select').val('');
                                $('#image_alert').text('');
                            }

                            if(data.imgext){
                                $('#image_alert').text(data.imgext);
                            }

                        })
                    }
                    else{
                        $('#image_alert').text('Image required');
                    }
                }
                if($('.submit').val()=="Save"){
                    let form=document.getElementById('addproduct_form');                
                    let formData = new FormData(form);
                    formData.append('saveProducts','post');
                    formData.append('prdctsave',prdctegedit_id);
                    fetch('assets/process/product-process.php',{
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data.correct=="ok"){
                            loadProducts()
                            $('#addproduct_form').slideUp('fast');
                            $('.submit').val('Submit')
                            $('.form_group input').val('');
                            $('.form_group textarea').val('');
                            $('.form_group select').val('');
                            $('#image_alert').text('');
                        }

                        if(data.imgext){
                            $('#image_alert').text(data.imgext);
                        }

                    })
                }
            })

            $('body').on('click','.stbtn',function(){
                if(this.classList.contains('status_active')){
                    prdct_id=this.parentElement.parentElement.dataset.id;
                    let formData = new FormData();
                    formData.append('deactiveprdct','post');
                    formData.append('prdct',prdct_id)
                    fetch('assets/process/product-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="success"){
                            loadProducts()
                        }
                    })
                }

                if(this.classList.contains('status_deactive')){
                    prdct_id=this.parentElement.parentElement.dataset.id;
                    let formData = new FormData();
                    formData.append('activeprdct','post');
                    formData.append('prdct',prdct_id)
                    fetch('assets/process/product-process.php', {
                        method: 'post',
                        body: formData,
                    })
                    .then( res => res.json())
                    .then( data => {
                        //console.log(data);
                        if(data=="success"){
                            loadProducts()
                        }
                    })
                }
            })

            $('body').on('click','.delete_prdct',function(){
                prdct_id=this.parentElement.parentElement.dataset.id;
                let formData = new FormData();
                formData.append('deleteprdct','post');
                formData.append('prdct',prdct_id)
                fetch('assets/process/product-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    if(data=="success"){
                        loadProducts()
                    }
                })
            })

            $('body').on('click','.edite_prdct',function(){
                prdctegedit_id=this.parentElement.parentElement.dataset.id
                let formData = new FormData();
                formData.append('prdeditgetdata','post');
                formData.append('prdct',prdctegedit_id)
                fetch('assets/process/product-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    $('#categoriesId').val(data.categories_id);
                    $('#categoriesId').change();
                    setTimeout(() => {
                        $('#sub_categoriesId').val(data.sub_categories_id);
                    }, 500);
                    $('#seasonId').val(data.seasons_id);
                    $('#prdctname').val(data.product_name);
                    $('#best_seller').val(data.best_seller);
                    $('#prdctmrp').val(data.mrp);
                    $('#prdctprice').val(data.price);
                    $('#prdctOffer').val(data.offer);
                    $('#prdctofferdate').val(data.offer_expdate);
                    $('#prdctqty').val(data.qty);
                    $('#prdctdescription').val(data.description);
                    $('#prdctmeta_title').val(data.meta_title);
                    $('#addproduct_form').slideDown('fast');
                    $('.submit').val('Save');
                })
            })





        })
    </script>
</body>
</html>