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

    $('#subscriptionModal').on('click',function(){
        this.style.display="none";
    })
    $('#close_modal').on('click',function(){
        document.getElementById('subscriptionModal').style.display="none";
    })
})