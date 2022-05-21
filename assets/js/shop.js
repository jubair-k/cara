document.addEventListener('DOMContentLoaded',function(){
    function loadProducts(){
        // let spinner=document.createElement('div');
        // spinner.id="spinner";
        document.getElementById('proContainer').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('page','shop');
        fetch("assets/process/shop-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            console.log(data);
            products="";
            for (const row of data.prdct) {
                products+=`<div class="pro" onclick="window.location.href='sproduct.html?prkeyv=${row.id}'">
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
                                        <h4><strike>$${row.mrp}</strike> &nbsp; ${row.price}</h4>
                                        <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
                                    </div>
                                </div>`
            }
            document.getElementById('proContainer').innerHTML=products;
            prnames=document.querySelectorAll('.pr_name');
            Array.from(prnames).forEach( ele => {
                if(ele.textContent.length>20) ele.textContent=ele.textContent.slice(0,20)+" ...";
            })        

            categories=``;
            for (const row of data.categ) {
                categories+=`<li>
                                <label>
                                    <input type="radio" value="${row.id}"  name="category" class="category_filt">
                                    ${row.categories}
                                </label>
                            </li>`;
            }
            document.getElementById('categories').innerHTML=categories;

            subcategories="";
            for (const row of data.allsubcateg) {
                subcategories+=`<li>
                                    <label>
                                        <input type="checkbox" value="${row.id}"  name="category[]" class="category_filt">
                                        ${row.sub_categories}
                                    </label>
                                </li>`
            }
            document.getElementById('subcategories').innerHTML=subcategories;

        })    
    }

    loadProducts()

    $("#filterNavLg").on('click',function(){
        $('.filter_container').toggleClass('fliter_active_lg')
    })

    $("#filterNavMd").on('click',function(){
        $('.filter_container').toggleClass('fliter_active_md')
    })


    $('body').on('change', 'input[name=category]', function() {
        subcategories="";
        document.getElementById('subcategories').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('fun','categfilter');
        formData.append('categid',$('input[name=category]:checked').val());
        fetch("assets/process/shop-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
            for (const row of data.subcateg) {
                subcategories+=`<li>
                                    <label>
                                        <input type="checkbox" value="${row.id}"  name="category[]" class="category_filt">
                                        ${row.sub_categories}
                                    </label>
                                </li>`
            }
            document.getElementById('subcategories').innerHTML=subcategories;

        })

     });

})