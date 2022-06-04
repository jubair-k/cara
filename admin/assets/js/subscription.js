document.addEventListener('DOMContentLoaded',function(){
    $('#menu-btn').click(function(){
        $('#menu').toggleClass('active')
    })

    $('.logot_popup_btn').click(function(){
        $('.logout_popup_wraper').toggleClass('logout_popup_active')
    })


    $('#sendBulksBtn').click(function(){
        $('#sendmail_form').slideToggle('slow');
    })

    function loadMails(){
        document.getElementById('mail_tbody').innerHTML=`<div class="spinner"></div>`;
        let formData = new FormData();
        formData.append('pages','loadMails');
        fetch('assets/process/subscription-process.php', {
            method: 'POST',
            body: formData,
        })
        .then( res => res.json())
        .then( data => {
            //console.log(data);
            trs="";
            for (const row of data.mails) {
                trs+=`<tr data-id="${row.id}">
                        <td>${row.mail}</td>
                        <td class="operate_td"> <button class="delete_mail">Delete</button></td>
                    </tr>`
            }
            document.getElementById('mail_tbody').innerHTML=trs;

            if(data.mails.length==0)document.getElementById('mail_tbody').innerHTML="<p style='padding:10px';>No data founds</p>";
        })
    }

    loadMails();

    $('body').on('click','.delete_mail',function(){
        mail_id=this.parentElement.parentElement.dataset.id;
        let formData = new FormData();
        formData.append('pages','deletmail');
        formData.append('mail',mail_id)
        fetch('assets/process/subscription-process.php', {
            method: 'post',
            body: formData,
        })
        .then( res => res.json())
        .then( data => {
            //console.log(data);
            if(data=="success"){
                loadMails()
            }
        })
    })

    $('#sendmail_form').on('submit',function(e){
        e.preventDefault();
        if($('#subject').val()!="" && $('#mailody').val()!=""){
            Swal.fire({
                title:'Sending ...',
                text:'Please Wait !',
                showConfirmButton:false,
                allowOutsideClick:false,
                willOpen: ()=> { Swal.showLoading() }
            })

            let formData = new FormData();
            formData.append('pages','sendBulk');
            formData.append('subject',$('#subject').val())
            formData.append('body',$('#mailody').val())
            fetch('assets/process/subscription-process.php', {
                method: 'post',
                body: formData,
            })
            .then( res => res.json())
            .then( data => {
                //console.log(data);
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