document.addEventListener('DOMContentLoaded',function(){
    if(localStorage.getItem('cara')){
        localObj=JSON.parse(localStorage.getItem('cara'));
        if(localObj.product){
            product=localObj.product
        }
    } else {
        window.location="shop.php";
    }

    function loadProduct(){
        document.getElementById('imgContainer').innerHTML=`<div class="spinner"></div>`;
        document.getElementById('productDetails').innerHTML=`<div class="spinner"></div>`;
        document.getElementById('sproductContainer').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('pages','sproduct');
        formData.append('product',product);
        fetch('assets/process/sproduct-process.php',{
            method:"POST",
            body:formData
        })
        .then( res => res.json())
        .then( data => {
            //console.log(data);
            productDetail="";
            if(data.prdct){
                productDetail=`<h4>${data.prdct.product_name}</h4>
                                <h2>₹${data.prdct.price} <strike>₹${data.prdct.mrp}</strike></h2>`
                                if(Number(data.prdct.qty)>0){
                                    productDetail+=`<input type="number" class="quantityinpt" value="1" name="quantity" min="1" max="${Number(data.prdct.qty)}"></input>`
                                } else {
                                    productDetail+=`<input type="text" class="quantityinpt" name="quantity" style="color: #ec544e;" value="OUT OF STOCK" readonly></input>`
                                }
                productDetail+=`<button class="normal addtocart_single" data-id="${data.prdct.id}">Add To Cart</button>
                                <h4>Product Details</h4>
                                <span>${data.prdct.description}</span>`

                document.getElementById('productDetails').innerHTML=productDetail;
                document.getElementById('imgContainer').innerHTML=`<img src="media/products/${data.prdct.image}" width="100%" id="mainImg" alt="">`;
                document.getElementById('productSubCateg').textContent=data.prdct.sub_categories;
            }

            if(data.featured){
                products="";
                for (const row of data.featured) {
                    products+=`<div class="pro" data-id="${row.id}">
                                    <img src="media/products/${row.image}" alt="">
                                    <div class="des">
                                    <h5 class="pr_name">${row.product_name}</h5>
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h4><strike>₹${row.mrp}</strike> &nbsp; ${row.price}</h4>
                                        <a data-mx="${row.qty}" class="addcart" href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                    </div>
                                </div>`
                }
                document.getElementById('sproductContainer').innerHTML=products;
                prnames=document.querySelectorAll('.pr_name');
                Array.from(prnames).forEach( ele => {
                    if(ele.textContent.length>20) ele.textContent=ele.textContent.slice(0,20)+" ...";
                })            
            }

            const container = document.getElementById("imgContainer");
            const img = document.querySelector("#imgContainer img");
        
            container.addEventListener("mousemove", (e) => {
                const x = e.clientX - e.target.offsetLeft;
                const y = e.clientY - e.target.offsetTop;
        
                img.style.transformOrigin = `${x}px ${y}px`;
                img.style.transform = "scale(2)";
            });
        
            container.addEventListener("mouseleave", () => {
                img.style.transformOrigin = "center center";
                img.style.transform = "scale(1)";
            });        
        })
    }

    loadProduct();

    // click the single product image
    $('#sproductContainer').on('click','.pro img',function(){
        if(localStorage.getItem("cara")){
            localObj=JSON.parse(localStorage.getItem("cara"));
            localObj.product=this.parentElement.dataset.id;
            localStorage.setItem("cara",JSON.stringify(localObj));
            window.location="sproduct.php";
        }
    })

    // click the single product name
    $('#sproductContainer').on('click','.pr_name',function(){
        if(localStorage.getItem("cara")){
            localObj=JSON.parse(localStorage.getItem("cara"));
            localObj.product=this.parentElement.parentElement.dataset.id;
            localStorage.setItem("cara",JSON.stringify(localObj));
            window.location="sproduct.php";
        }
    })

    $('#productDetails').on('change','.quantityinpt',function(){
        val=this.value;
        maxval=Number($(this).attr('max'));
        if(val<=0) this.value=1;
        if(val>maxval) this.value=maxval;
    })





})