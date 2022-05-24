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
            //console.log(data);
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
                                        <input type="checkbox" value="${row.id}"  name="subcategory" class="category_filt">
                                        ${row.sub_categories}
                                    </label>
                                </li>`
            }
            document.getElementById('subcategories').innerHTML=subcategories;

            pages="";
            for (let i = 0; i <data.count ; i++) {
                if(data.count>1){
                    pages+=`
                    <a href="#" data-page="${i}" class="paginations">${i+1}</a>`
                }
            }
            document.getElementById('pagination').innerHTML=pages;
        })    

        localObj={
            categories:"",
            subcategories:"",
            sortby:"",
            page:"0"
        }
        localStorage.setItem("cara",JSON.stringify(localObj));
    }

    loadProducts()

    $("#filterNavLg").on('click',function(){
        $('.filter_container').toggleClass('fliter_active_lg')
    })

    $("#filterNavMd").on('click',function(){
        $('.filter_container').toggleClass('fliter_active_md')
    })

    // filter subcategories whene categories clicked
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
                                        <input type="checkbox" value="${row.id}"  name="subcategory" class="category_filt">
                                        ${row.sub_categories}
                                    </label>
                                </li>`
            }
            document.getElementById('subcategories').innerHTML=subcategories;
        })
    });


    // pagination
    $('body').on('click','.paginations',function(e){
        e.preventDefault();
        selectedPage=$(this).attr('data-page');
        $('.paginations').removeClass('page_active');
        $(this).addClass('page_active');
        checkedItems=document.querySelectorAll('input[name=subcategory]:checked');
        subcategoriesArr=[];
        if(checkedItems.length>0){
            Array.from(checkedItems).map( ele => subcategoriesArr.push(ele.value) );
        }
        selectCategory=$('input[name=category]:checked').val();
        sortbyVal=$('#sortby').val();

        document.getElementById('proContainer').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('fun','pagination');
        formData.append('page',$(this).attr('data-page'));
        if(selectCategory!="" && selectCategory!=null) formData.append('categ',selectCategory);
        if(subcategoriesArr.length>0 && subcategoriesArr!=null) formData.append('subcateg',subcategoriesArr);
        if(sortbyVal!="" && sortbyVal!=null) formData.append('sortby',sortbyVal);
        fetch("assets/process/shop-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
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
            window.scrollTo(0, 0);

            if(localStorage.getItem("cara")){
                localObj=JSON.parse(localStorage.getItem("cara"));
                localObj.page=selectedPage;
                localStorage.setItem("cara",JSON.stringify(localObj));
            }
        })
    })


    // reset filter
    $('#resetFilter').click(function(e){
        e.preventDefault()
        checkedItems=document.querySelectorAll('input[name=subcategory]:checked');
        Array.from(checkedItems).map( ele => {
            $(ele).prop('checked', false); 
        })
        $('input[name=category]:checked').prop('checked', false)

        document.getElementById('subcategories').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('fun','resetfilter');
        fetch("assets/process/shop-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
            subcategories="";
            for (const row of data.allsubcateg) {
                subcategories+=`<li>
                                    <label>
                                        <input type="checkbox" value="${row.id}"  name="subcategory" class="category_filt">
                                        ${row.sub_categories}
                                    </label>
                                </li>`
            }
            document.getElementById('subcategories').innerHTML=subcategories;
            $('#applayFilter').click();
        })

    })

    // applay filter
    $('#applayFilter').click(function(e){
        e.preventDefault()
        checkedItems=document.querySelectorAll('input[name=subcategory]:checked');
        subcategoriesArr=[];
        if(checkedItems.length>0){
            Array.from(checkedItems).map( ele => subcategoriesArr.push(ele.value) );
        }
        selectCategory=$('input[name=category]:checked').val();

        sortbyVal=$('#sortby').val()
        document.getElementById('proContainer').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('fun','applayfilter');
        if(selectCategory!="" && selectCategory!=null) formData.append('categ',selectCategory);
        if(subcategoriesArr.length>0 && subcategoriesArr!=null) formData.append('subcateg',subcategoriesArr);
        if(sortbyVal!="" && sortbyVal!=null) formData.append('sortby',sortbyVal);
        fetch("assets/process/shop-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
            products="";
            for (const row of data.filter) {
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
            
            pages="";
            for (let i = 0; i <data.count ; i++) {
                if(data.count>1) pages+=`<a href="#" data-page="${i}" class="paginations">${i+1}</a>`;
            }
            document.getElementById('pagination').innerHTML=pages;
            if($(window).width()<830){ $("#filterNavMd").click() };

            if(selectCategory=="" || selectCategory==null){selectCategory=""};
            localObj={
                categories:selectCategory,
                subcategories:subcategoriesArr,
                sortby:sortbyVal,
                page:"0"
            }
            localStorage.setItem("cara",JSON.stringify(localObj));
        })
    })

    // sort by
    $('#sortby').on('change',function(){
        sortbyVal=this.value;
        pageNum=$('.page_active').attr('data-page');
        if(pageNum==undefined || pageNum==""){pageNum=0};
        checkedItems=document.querySelectorAll('input[name=subcategory]:checked');
        subcategoriesArr=[];
        if(checkedItems.length>0){
            Array.from(checkedItems).map( ele => subcategoriesArr.push(ele.value) );
        }
        selectCategory=$('input[name=category]:checked').val();
        document.getElementById('proContainer').innerHTML=`<div class="spinner"></div>`;
        var formData=new FormData();
        formData.append('fun','pagination');
        formData.append('page',pageNum);
        if(selectCategory!="" && selectCategory!=null) formData.append('categ',selectCategory);
        if(subcategoriesArr.length>0 && subcategoriesArr!=null) formData.append('subcateg',subcategoriesArr);
        if(sortbyVal!="" && sortbyVal!=null) formData.append('sortby',sortbyVal);
        fetch("assets/process/shop-process.php",{
            method:"POST",
            body:formData
        })
        .then( res => res.json() )
        .then( data => {
            //console.log(data);
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

            if(localStorage.getItem("cara")){
                localObj=JSON.parse(localStorage.getItem("cara"));
                localObj.sortby=sortbyVal;
                localObj.page=pageNum;
                localStorage.setItem("cara",JSON.stringify(localObj));
            }
        })
    })

})