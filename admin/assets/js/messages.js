document.addEventListener('DOMContentLoaded',function(){
    $('#menu-btn').click(function(){
        $('#menu').toggleClass('active')
    })

    $('.logot_popup_btn').click(function(){
        $('.logout_popup_wraper').toggleClass('logout_popup_active')
    })


    function loadMessages(){
        document.getElementById('msges_tbody').innerHTML=`<div class="spinner"></div>`;
        let formData = new FormData();
        formData.append('pages','loadMessages');
        fetch('assets/process/messages-process.php', {
            method: 'POST',
            body: formData,
        })
        .then( res => res.json())
        .then( data => {
            //console.log(data);
            trs="";
            for (const row of data.msgs) {
                trs+=`<tr data-id="${row.id}">
                        <td>${row.user_name}</td>
                        <td>${row.email}</td>
                        <td>${row.subject}</td>
                        <td class="viewmsg"><i class="fal fa-eye"></i></td>
                        <td class="operate_td"> <button class="replay">Replay</button> <button class="delete_msg">Delete</button></td>
                    </tr>`
            }
            document.getElementById('msges_tbody').innerHTML=trs;

            if(data.msgs.length==0)document.getElementById('msges_tbody').innerHTML="<p style='padding:10px';>No data founds</p>";
        })
    }

    loadMessages();

    $('body').on('click','.viewmsg',function(){
        Swal.fire({
            title:'Loading ...',
            text:'Please Wait !',
            showConfirmButton:false,
            allowOutsideClick:false,
            willOpen: ()=> { Swal.showLoading() }
        })
        msgId=this.parentElement.dataset.id;
        let formData = new FormData();
        formData.append('pages','viewMsg');
        formData.append('msg',msgId)
        fetch('assets/process/messages-process.php', {
            method: 'post',
            body: formData,
        })
        .then( res => res.json())
        .then( data => {
            //console.log(data);
            if(data.message){
                Swal.fire({
                    html:`<p style="text-align: justify;color: #554cd1;padding: 20px;font-weight: 500;">${data.message}</p>`,
                });    
            }
        })
    })

    $('body').on('click','.delete_msg',function(){
        msg_id=this.parentElement.parentElement.dataset.id;
        Swal.fire({  
            title: 'Do you want to Delet the Message?',  
            showCancelButton: true,  
            confirmButtonText: `Yes`,  
            cancelButtonText: `No`,
        }).then((result) => {  
            /* Read more about isConfirmed, isDenied below */  
            if (result.isConfirmed) {  
                let formData = new FormData();
                formData.append('pages','deletMsg');
                formData.append('msg',msg_id)
                fetch('assets/process/messages-process.php', {
                    method: 'post',
                    body: formData,
                })
                .then( res => res.json())
                .then( data => {
                    //console.log(data);
                    if(data=="success") loadMessages();
                })
                Swal.fire('Deleted!', '', 'success')  
            }
        });
    });

    $('body').on('click','.replay',function(){
        msg_id=this.parentElement.parentElement.dataset.id;
        Swal.fire({  
            showConfirmButton:false,
            showCancelButton: true,  
            html: `<form class='send_message' data-id="${msg_id}" style="width:100%;margin:0 auto;display: flex;flex-direction: column;padding: 15px 25px;box-shadow: 0px 0px 4px .5px rgba(0, 0, 0, 0.397);align-items: flex-start;">
                        <label style="" for=''>Subject</label>
                        <input style="display: block;width: 100%;padding: 5px 15px;outline: none;border-radius: 4px;border: 1px solid #cfcfcf;font-size: 1rem;margin-top: 5px;margin-bottom: 20px;" type='text' placeholder='' id='subject' autocomplete='off' required>
                        <label for=''>Body</label>
                        <textarea style="display: block;width: 100%;padding: 5px 15px;outline: none;border-radius: 4px;border: 1px solid #cfcfcf;font-size: 1rem;margin-top: 5px;margin-bottom: 20px;" name='mailody' id='mailody' cols='30' rows='10' autocomplete='off' required></textarea>
                        <input style="display: block;padding: 10px 20px;outline: none;border: none;font-size: 1rem;background-color: #554cd1;color: #fff;border-radius: 4px;cursor: pointer;margin-top: 30px;width: 100%;z-index: 500;" type='submit' class='submit' value='Send'>    
                    </form>`
        })
    })

    $('body').on('submit','.send_message',function(e){
        e.preventDefault();
        msgId=this.dataset.id;
        if($('#subject').val()!="" && $('#mailody').val()!=""){
            Swal.fire({
                title:'Sending ...',
                text:'Please Wait !',
                showConfirmButton:false,
                allowOutsideClick:false,
                willOpen: ()=> { Swal.showLoading() }
            })

            let formData = new FormData();
            formData.append('pages','sendmsg');
            formData.append('msg',msgId);
            formData.append('subject',$('#subject').val())
            formData.append('body',$('#mailody').val())
            fetch('assets/process/messages-process.php', {
                method: 'post',
                body: formData,
            })
            .then( res => res.json())
            .then( data => {
                console.log(data);
                if(data.error){
                    Swal.fire({
                        icon: "error",
                        title:"Something is wrong.",
                        timer:6000
                    })    
                }
                else if(data.done){
                    Swal.fire({
                        icon: "success",
                        title:data.done,
                        timer:6000
                    });    
                    $('#subject').val("");
                    $('#mailody').val('');
                }
            })
        }
    });

})