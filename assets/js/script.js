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
            Swal.fire({
                title:'Checking ...',
                text:'Please Wait !',
                showConfirmButton:false,
                allowOutsideClick:false,
                willOpen: ()=> {
                  Swal.showLoading()
                }
              })
          
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
                if(data.check){
                    Swal.fire({
                        icon: "warning",
                        title:data.check,
                        timer:6000
                    })    
                }
                else if(data.exist){
                    Swal.fire({
                        icon: "info",
                        title:data.exist,
                        timer:6000
                    })    
                }
                else if(data.wrong){
                    Swal.fire({
                        icon: "error",
                        title:data.wrong,
                        timer:6000
                    })    
                }
                else if(data.done){
                    Swal.fire({
                        icon: "success",
                        title:data.done,
                        timer:6000
                    });    
                    document.getElementById('newsletter').style.display="none";
                }
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