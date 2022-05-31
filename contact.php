<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/jquery/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>Cara</title>
</head>

<body id="page4">
    <?php include "header.php"; ?>

    <section id="page-header" class="about-header">
        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE. We love hear from you!</p>
    </section>

    <section id="contact-details" class="section-p1">
        <div class="detils">
            <span>GET IN TOUCH</span>
            <h2>visit one of our agency location or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>56 Blassford Street Glasgow G1 1UL New York</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9.00am to 16.00pm</p>
                </li>
            </div>
        </div>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.808802525455!2d-1.2565554845845797!3d51.75481970040392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c6a9ef8c485b%3A0xd2ff1883a001afed!2sUniversity%20of%20Oxford!5e0!3m2!1sen!2sin!4v1644042916145!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <section id="form-details">
        <form id="messageForm">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="mail" placeholder="E-mail" required>
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your message" required></textarea>
            <button type="submit" class="normal">Submit</button>
        </form>

        <div class="people">
            <div>
                <img src="assets/images/people/1.png" alt="">
                <p>
                    <span>John Deo</span>
                    Senior Marketing Manager <br>
                    Phone: +000 123 000 77 88 <br>
                    Email: contact@example.com
                </p>
            </div>
            <div>
                <img src="assets/images/people/2.png" alt="">
                <p>
                    <span>William Smith</span>
                    Senior Marketing Manager <br>
                    Phone: +000 123 000 77 88 <br>
                    Email: contact@example.com
                </p>
            </div>
            <div>
                <img src="assets/images/people/3.png" alt="">
                <p>
                    <span>Emma Stone</span>
                    Senior Marketing Manager <br>
                    Phone: +000 123 000 77 88 <br>
                    Email: contact@example.com
                </p>
            </div>
        </div>
    </section>

    <?php include "subscription.php"; ?>
    <?php include "footer.php"; ?>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/cart.js"></script>
    <script src="assets/js/contact.js"></script>
</body>

</html>