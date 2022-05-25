<section id="header">
    <a href="index.php"><img src="assets/images/logo.png" class="logo" alt=""></a>
    
    <div>
        <ul id="navbar">
            <li><a class="page1 active" href="index.php">Home</a></li>
            <li><a class="page2" href="shop.php">Shop</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a class="page3" href="about.html">About</a></li>
            <li><a class="page4" href="contact.php">Contact</a></li>
            <li id="lg-bag"><a class="page5"  href="cart.php"><i class="fal fa-shopping-bag"></i></a></li>
            <a href="#" id="close"><i class="far fa-times"></i></a>
        </ul>
    </div>
    
    <div id="mobile">
        <a class="page5" href="cart.php"><i class="fal fa-shopping-bag"></i></a>
        <i id="bar" class="fas fa-outdent"></i>

    </div>
    
</section>

<script>
    page=document.body.getAttribute('id');
    currentActive=document.querySelector("#navbar li .active");
    currentActive.classList.remove('active');
    document.querySelector("."+page).classList.add('active');
</script>
