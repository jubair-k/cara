document.addEventListener('DOMContentLoaded',function(){
    if(localStorage.getItem('caraCart')){
        cartArr=JSON.parse(localStorage.getItem('caraCart'));
        if(cartArr.length>0) $('.cartcount').text(cartArr.length); 
    }

    $('body').on('click','.addcart',function(e){
        e.preventDefault();
        if(localStorage.getItem('caraCart')){
            cartArr=JSON.parse(localStorage.getItem('caraCart'));
        } else{
            cartArr=[];
        }
        index=0;
        product=this.parentElement.parentElement.dataset.id;
        for (const obj of cartArr) {
            obj.id==product ? obj.quanity+=1 : index++;
        }

        if(index===cartArr.length){
            quntity=0;
            cartobj={
                id:product,
                quanity:quntity
            }
            cartArr.push(cartobj);
        }
        localStorage.setItem('caraCart',JSON.stringify(cartArr));
        if(cartArr.length>0) $('.cartcount').text(cartArr.length);
    })
})