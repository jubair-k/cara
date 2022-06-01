<?php
    if(!isset($_SESSION['cara_signup']) || empty($_SESSION['cara_signup'])){
        ?>
            <section id="newsletter" class="section-p1 section-m1">
                <div class="newstext">
                    <h4>Sign Up For Newsletters</h4>
                    <p>Get E-mail updates our about out latest shop and <span>special offers</span></p>  
                </div>
                <div class="form">
                    <input type="text" id="email" placeholder="Your email address">
                    <button class="normal" id="subscribe">Sign Up</button>
                </div>
            </section>
        <?php
    }
?>


<section id="subscriptionModal" class="">
    <div class="modal_content">
        <h4 id="modalTitle">Thanks for subscribing Us</h4>
        <button id="close_modal">OK</button>
    </div>
</section>

