<?php
include_once("header.php");
?>

<section id="page-header" class="about-header">
  <h2>#Let's_Talk</h2>
  <p>Lorem ipsum dolor sit amet consectetur.</p>
</section>

<section id="contact-details" class="section-p1">
  <div class="details">
    <span>GET IN TOUCH</span>
    <h2>Visit one of our agency near you!</h2>
    <h3>Head Office</h3>
    <div>
      <li>
        <i class="fa-solid fa-map-location-dot"></i>
        <p>P-3A Holy Redeemer Butuan City</p>
      </li>
      <li>
        <i class="fa-solid fa-envelope"></i>
        <p>jeromemain07@gmail.com</p>
      </li>
      <li>
        <i class="fa-solid fa-phone-alt"></i>
        <p>09500020858</p>
      </li>
      <li>
        <i class="fa-solid fa-clock"></i>
        <p>Monday to Saturday: 9:00am to 16:pm</p>
      </li>
    </div>
  </div>

  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252277.0371994766!2d125.41762954887906!3d8.895512425375928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3301e998b1704fcf%3A0x85e95810384ea2d6!2sButuan%20City%2C%20Agusan%20Del%20Norte!5e0!3m2!1sen!2sph!4v1701012576606!5m2!1sen!2sph" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</section>

<section id="form-details">
  <form action="">
    <span>SEND A MESSAGE</span>
    <h2>We love to hear from you</h2>
    <input type="text" placeholder="Your Name">
    <input type="text" placeholder="E-mail">
    <input type="text" placeholder="Subject">
    <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
    <button class="normal">Submit</button>
  </form>

  <div class="people">
    <div>
      <img src="img/people/1.png" alt="">
      <p><span>John Doe</span>Senior Marketing Manager <br> Phone: 09270269245 <br>
        Email: jd@contact.com
      </p>
    </div>
    <div>
      <img src="img/people/2.png" alt="">
      <p><span>John Doe</span>Senior Marketing Manager <br> Phone: 09270269245 <br>
        Email: jd@contact.com
      </p>
    </div>
    <div>
      <img src="img/people/3.png" alt="">
      <p><span>John Doe</span>Senior Marketing Manager <br> Phone: 09270269245 <br>
        Email: jd@contact.com
      </p>
    </div>
  </div>
</section>

<section id="newsletter" class="section-p1 section-m1">
  <div class="newstext">
    <h4>Sign Up For Newsletters</h4>
    <p>
      Get E-mail updates about our latest products and
      <span>special offers</span>
    </p>
  </div>
  <div class="form">
    <input type="text" placeholder="Your email address" />
    <button class="normal">Sign Up</button>
  </div>
</section>

<?php
include_once("footer.php");
?>