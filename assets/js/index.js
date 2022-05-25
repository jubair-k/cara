document.addEventListener('DOMContentLoaded',function(){
    localObj={
        categories:"",
        subcategories:"",
        sortby:"0",
        page:"0"
    }
    localStorage.setItem("cara",JSON.stringify(localObj));  


    $('.pro img').on('click',function(){
        if(localStorage.getItem("cara")){
            localObj=JSON.parse(localStorage.getItem("cara"));
            localObj.product=this.parentElement.dataset.id;
            localStorage.setItem("cara",JSON.stringify(localObj));
            window.location="sproduct.php";
        }
    })

    $('.pro .pr_name').on('click',function(){
        if(localStorage.getItem("cara")){
            localObj=JSON.parse(localStorage.getItem("cara"));
            localObj.product=this.parentElement.parentElement.dataset.id;
            localStorage.setItem("cara",JSON.stringify(localObj));
            window.location="sproduct.php";
        }
    })




})