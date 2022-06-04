document.addEventListener('DOMContentLoaded',function(){
    $('#menu-btn').click(function(){
        $('#menu').toggleClass('active')
    })

    $('.logot_popup_btn').click(function(){
        $('.logout_popup_wraper').toggleClass('logout_popup_active')
    })

    $('#addproductBtn').click(function(){
        $('#addproduct_form').slideToggle('slow');
    })

    function loadProductsTable(){
        let formData = new FormData();
        formData.append('loadProducts','post');
        fetch('assets/process/product-process.php', {
            method: 'post',
            body: formData,
        })
        .then( res => res.json())
        .then( data => {
            console.log(data);
            $('#productTable').DataTable({
                destroy: true,
                processing: true,
                data: data.prdct,
                columns: [
                    { data: 'categories' },
                    { data: 'sub_categories' },
                    { data: 'product_name' },
                    {
                        data: 'image', "render": function (data) {
                            return `<img src="../media/products/${data}" style="height:60px;width:60px;"/>`;
                        }
                    },
                    { data: 'mrp' },
                    { data: 'price' },
                    { data: 'qty' },
                    {mRender: function ( data, type, row ) {
                        if(row.status=='1'){
                            return '<button data-id="' + row.id + '" class="status_active stbtn">Active</button> <button data-id="' + row.id + '" class="edite_prdct">Edit</button> <button data-id="' + row.id + '" class="delete_prdct">Delete</button>';
                        } else{
                            return '<button data-id="' + row.id + '" class="status_deactive stbtn">Active</button> <button data-id="' + row.id + '" class="edite_prdct">Edit</button> <button data-id="' + row.id + '" class="delete_prdct">Delete</button>';
                        }
                        }
                    }
                ],
            });
        

        })
    }

    loadProductsTable()

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

    $('#addproduct_form').on('submit',function(e){
        e.preventDefault();
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
                        loadProductsTable()
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
                    loadProductsTable()
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
            prdct_id=this.dataset.id;
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
                    loadProductsTable()
                }
            })
        }

        if(this.classList.contains('status_deactive')){
            prdct_id=this.dataset.id;
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
                    loadProductsTable()
                }
            })
        }
    })

    $('body').on('click','.delete_prdct',function(){
        prdct_id=this.dataset.id;
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
                loadProductsTable()
                // var myTable = $('#productTable').DataTable();
                // console.log(myTable);
                // myTable.row( tr ).delete();-
            }
        })
    })

    $('body').on('click','.edite_prdct',function(){
        prdctegedit_id=this.dataset.id
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