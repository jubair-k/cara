document.addEventListener('DOMContentLoaded',function(){
    $('#messageForm').on('submit',function(e){
        Swal.fire({
            title:'Sending ...',
            text:'Please Wait !',
            showConfirmButton:false,
            allowOutsideClick:false,
            willOpen: ()=> {
              Swal.showLoading()
            }
        })
        form=document.getElementById('messageForm')
        e.preventDefault();
        let formData=new FormData(form);
        formData.append('pages','contact');
        fetch('assets/process/contact-process.php',{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
            if(data=="done"){
                $('#messageForm input').val('');
                $('#messageForm textarea').val('');
                Swal.fire({
                    icon: "success",
                    text:'YOUR MESSAGE WAS SENT SUCCESSFULLY. THANKS',
                    timer:6000
                })    

            }
        })
    })
})