document.addEventListener('DOMContentLoaded',function(){
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
                    </tr>`
            }
            $('.seasons_tbody').html(trs);
        })
    }

    loadSeasons();

    $('#addseasons_form').on('submit',function(e){
        e.preventDefault();
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
                        Swal.fire({
                            icon: "success",
                            title:"Season Added Successfully.",
                            timer:2000
                        });
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
                        Swal.fire({
                            icon: "success",
                            title:"Changes Saved Successfully.",
                            timer:2000
                        });
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
        Swal.fire({  
            title: 'Do you want to Delet the Season?',  
            showCancelButton: true,  
            confirmButtonText: `Yes`,  
            cancelButtonText: `No`,
        }).then((result) => {  
            if (result.isConfirmed) {  
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
                    if(data=="success") loadSeasons();
                })
                Swal.fire('Deleted!', '', 'success')  
            }
        });
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
                if(data=="success") loadSeasons();
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
                if(data=="success") loadSeasons();
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
