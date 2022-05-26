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
        maxquantity=Number(this.dataset.mx);
        qty=1;
        for (const obj of cartArr) {
            if(obj.id==product) {
                (Number(obj.quanity)+qty)>maxquantity ?  obj.quanity=maxquantity : obj.quanity=Number(obj.quanity)+qty;
            }  else{
                index++;
            }
        }

        if(index===cartArr.length){
            quntity=1;
            cartobj={
                id:product,
                quanity:quntity
            }
            cartArr.push(cartobj);
        }
        localStorage.setItem('caraCart',JSON.stringify(cartArr));
        if(cartArr.length>0) $('.cartcount').text(cartArr.length);
    })

    $('#productDetails').on('click','.addtocart_single',function(e){
        e.preventDefault();
        if(localStorage.getItem('caraCart')){
            cartArr=JSON.parse(localStorage.getItem('caraCart'));
        } else{
            cartArr=[];
        }

        index=0;
        product=this.dataset.id;
        if($('.quantityinpt').val()!="OUT OF STOCK"){
            maxquantity=Number($('.quantityinpt').attr('max'));
            qty=Number($('.quantityinpt').val());
            for (const obj of cartArr) {
                if(obj.id==product) {
                    (Number(obj.quanity)+qty)>maxquantity ?  obj.quanity=maxquantity : obj.quanity=Number(obj.quanity)+qty;
                }  else{
                    index++;
                }
            }
        } else{
            qty=0;
            for (const obj of cartArr) {
                if(obj.id!=product) index++;
            }    
        }

        if(index===cartArr.length){
            cartobj={
                id:product,
                quanity:qty
            }
            cartArr.push(cartobj);
        }
        localStorage.setItem('caraCart',JSON.stringify(cartArr));
        if(cartArr.length>0) $('.cartcount').text(cartArr.length);
    })
})