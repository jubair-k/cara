document.addEventListener('DOMContentLoaded',function(){
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

    $('#addsub_ctegories_form').on('submit',function(e){
        e.preventDefault();
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
            if(data=="success")  loadSubCategories();
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
                if(data=="success") loadSubCategories() ;
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
                if(data=="success") loadSubCategories() ;
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
