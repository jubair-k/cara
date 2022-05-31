document.addEventListener('DOMContentLoaded',function(){
    $('#messageForm').on('submit',function(e){
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
                document.getElementById('modalTitle').textContent="Thanks for your valuble Message.";
                document.getElementById('subscriptionModal').style.display="flex";
                setTimeout(() => {
                    document.getElementById('subscriptionModal').style.display="none";
                }, 8000);
            }
        })
    })
})