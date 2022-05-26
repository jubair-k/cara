document.addEventListener('DOMContentLoaded',function(){
    if(localStorage.getItem('caraCart')){
        cartArr=JSON.parse(localStorage.getItem('caraCart'));
    } else{
        cartArr=[];
    }

    if(cartArr.length>0){
        document.getElementById('cart').innerHTML=`<div class="spinner"></div>`;
        productsArr=[];
        for (const obj of cartArr) {
            productsArr.push(obj.id);
        }
        var formData=new FormData();
        formData.append('pages','cart');
        formData.append('products',productsArr);
        fetch("assets/process/cart-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
            cartTable="";
            cartSubtotal=0;
            if(data.length>0){
                cartTable=`<table width="100%">
                                <thead>
                                    <tr>
                                        <td>Remove</td>
                                        <td>Image</td>
                                        <td>Product</td>
                                        <td>Price</td>
                                        <td>Quantity</td>
                                        <td>Subtotal</td>
                                    </tr>
                                </thead>
                                <tbody>`
                for (const row of data) {
                    for (const obj of cartArr) {
                        if(obj.id==row.id){
                            cartTable+=`<tr data-id="${row.id}">
                                            <td><a class="remove_art" href="#"><i class="far fa-times-circle"></i></a></td>
                                            <td><img src="media/products/${row.image}"></td>
                                            <td>${row.product_name}</td>
                                            <td>₹ ${row.price}</td>`
                                            if(obj.quanity>0){
                                                cartTable+=`<td><input class="cartqtyinpt" type="number" data-price="${row.price}" value="${obj.quanity}" max="${Number(row.qty)}"></td>`
                                            } else{
                                                cartTable+=`<td><input class="cartqtyinpt" type="text" style="color: #ec544e;" value="OUT OF STOCK" readonly></td>`
                                            }
                                            cartTable+=`<td>₹ ${row.price*obj.quanity}</td>
                                        </tr>`
                            cartSubtotal+=(row.price*obj.quanity)
                        }
                    }
                }
                cartTable+=`</tbody></table>`;
                document.getElementById('cart').innerHTML=cartTable;
                $('.subtotal').text("₹ "+cartSubtotal)
            }
        })
    } else{
        document.getElementById('cart').innerHTML="<p>Your Cart is empty</p>";
    }


    $('body').on('change','.cartqtyinpt',function(){
        val=this.value;
        maxval=Number($(this).attr('max'));
        if(val<=0) this.value=1;
        if(val>maxval) this.value=maxval;
        this.parentElement.nextElementSibling.textContent="₹ "+this.dataset.price*this.value;

        let cartArr=[];
        parentbody=this.parentElement.parentElement.parentElement
        subTotal=0;
        Array.from(parentbody.children).map( (ele,ind) => {
            subTotal+=Number(ele.children[5].textContent.slice(2,));
            prdctid=ele.dataset.id;
            ele.children[4].children[0].value=="OUT OF STOCK" ? prdctqty=0 : prdctqty=ele.children[4].children[0].value
            obj={
                id:prdctid,
                quanity:prdctqty
            }
            cartArr.push(obj);
        })
        localStorage.setItem('caraCart',JSON.stringify(cartArr));
        $('.subtotal').text("₹ "+subTotal)
    })

})