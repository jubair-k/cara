document.addEventListener('DOMContentLoaded',function(){
    const bar= document.getElementById('bar')
    const nav=document.getElementById('navbar')
    const close=document.getElementById('close')

    if(bar){
        bar.addEventListener('click',() => {
            nav.classList.add('active')
        })
    }
    if(close){
        close.addEventListener('click',(event) => {
            event.preventDefault()
            nav.classList.remove('active')
        })
    }

    prnames=document.querySelectorAll('.pr_name');
    Array.from(prnames).forEach( ele => {
        if(ele.textContent.length>20) ele.textContent=ele.textContent.slice(0,20)+" ...";
    })

    $('#subscribe').on('click',function(){
        if($('#email').val()!="" && $('#email').val()!=null){
            document.getElementById('modalTitle').innerHTML=`<p>Please wait, It will take a few minutes.</p><div class="spinner"></div>`;
            document.getElementById('close_modal').style.visibility="hidden";
            document.getElementById('subscriptionModal').style.display="flex";
            let formData=new FormData();
            formData.append('pages','suscribe');
            formData.append('mail',$('#email').val());
            fetch('assets/process/subscribe-process.php',{
                method:"POST",
                body:formData
            })
            .then( res => res.json() )
            .then( data => {
                //console.log(data);
                document.getElementById('subscriptionModal').classList.add('close_modal_active');
                document.getElementById('close_modal').style.visibility="visible";
                document.getElementById('modalTitle').innerHTML=data;
                $('#email').val('')
            })
        }
    })

    $('body').on('click','.close_modal_active',function(){
        this.style.display="none";
    })
    $('#close_modal').on('click',function(){
        document.getElementById('subscriptionModal').style.display="none";
    })
})