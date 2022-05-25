document.addEventListener('DOMContentLoaded',function(){
    localObj={
        categories:"",
        subcategories:"",
        sortby:"0",
        page:"0"
    }
    localStorage.setItem("cara",JSON.stringify(localObj));  


    $('.pro').on('click',function(){
        if(localStorage.getItem("cara")){
            localObj=JSON.parse(localStorage.getItem("cara"));
            localObj.product=this.dataset.id;
            localStorage.setItem("cara",JSON.stringify(localObj));
            window.location="sproduct.php";
        }
    })


})