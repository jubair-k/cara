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
            console.log(data);
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
                                            <td><a href="#"><i class="far fa-times-circle"></i></a></td>
                                            <td><img src="media/products/${row.image}"></td>
                                            <td>${row.product_name}</td>
                                            <td>₹ ${row.price}</td>
                                            <td><input class="cartqtyinpt" type="number" value="${obj.quanity} min="1" max="${Number(row.qty)}""></td>
                                            <td>₹ ${row.price*obj.quanity}</td>
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


})