document.addEventListener('DOMContentLoaded',function(){
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
            //console.log(data);
            trs="";
            for (const row of data.categs) {
                trs+=`<tr data-id="${row.id}">
                        <td>${row.categories}</td>`
                if(row.status=='1'){
                    stbtn=`<button class="status_active stbtn">Active</button>`
                }else{
                    stbtn=`<button class="status_deactive stbtn">Deactive</button>`
                }
                trs+=`<td class="operate_td">${stbtn} <button class="edite_categ">Edit</button> <button class="delete_categ">Delete</button></td>
                    </tr>`
            }
            $('.categories_tbody').html(trs);
        })
    }

    loadCategories();

    $('#addctegories_form').on('submit',function(e){
        e.preventDefault();
        if($('#categoriesname').val()!=""){
            if($('.submit').val()=="Submit"){
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
                        Swal.fire({
                            icon: "success",
                            title:"Category Added Successfully.",
                            timer:2000
                        });
                        $('#categoriesname').val('');
                        loadCategories()
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
                formData.append('saveCategories','post');
                formData.append('categsavename',$('#categoriesname').val())
                formData.append('categsave',categedit_id)
                fetch('assets/process/categories-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    if(data=="ok"){
                        Swal.fire({
                            icon: "success",
                            title:"Changes Saved Successfully.",
                            timer:2000
                        });
                        $('#categoriesname').val('');
                        loadCategories()
                        $('#addctegories_form').slideUp('fast');
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

    $('body').on('click','.delete_categ',function(){
        categ_id=this.parentElement.parentElement.dataset.id;
        Swal.fire({  
            title: 'Do you want to Delet the Category?',  
            showCancelButton: true,  
            confirmButtonText: `Yes`,  
            cancelButtonText: `No`,
        }).then((result) => {  
            if (result.isConfirmed) {  
                let formData = new FormData();
                formData.append('deletecateg','post');
                formData.append('categ',categ_id)
                fetch('assets/process/categories-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    if(data=="success") loadCategories() ;
                })
                Swal.fire('Deleted!', '', 'success')  
            }
        });
    })

    $('body').on('click','.stbtn',function(){
        if(this.classList.contains('status_active')){
            categ_id=this.parentElement.parentElement.dataset.id;
            let formData = new FormData();
            formData.append('deactivecateg','post');
            formData.append('categ',categ_id)
            fetch('assets/process/categories-process.php', {
                method: 'post',
                body: formData,
            })
            .then( res => res.json())
            .then( data => {
                //console.log(data);
                if(data=="success") loadCategories() ;
            })
        }

        if(this.classList.contains('status_deactive')){
            categ_id=this.parentElement.parentElement.dataset.id;
            let formData = new FormData();
            formData.append('activecateg','post');
            formData.append('categ',categ_id)
            fetch('assets/process/categories-process.php', {
                method: 'post',
                body: formData,
            })
            .then( res => res.json())
            .then( data => {
                //console.log(data);
                if(data=="success"){
                    loadCategories()
                }
            })
        }
    })

    $('body').on('click','.edite_categ',function(){
        categedit_id=this.parentElement.parentElement.dataset.id
        $('#addctegories_form').slideDown('fast');
        $('#categoriesname').val(this.parentElement.parentElement.children[0].textContent)
        $('.submit').val('Save')
    })
})
