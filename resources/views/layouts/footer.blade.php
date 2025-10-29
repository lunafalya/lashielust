  <!-- FOOTER -->
<footer>
  <div class="footer-content">
    <img src="{{ asset('images/logo.png') }}" alt="Lashie Lust Logo">
  <div class="footer-socials">
    <a href="https://www.facebook.com/"class="service-link">
      <img src="{{ asset('images/1.png') }}" alt="1">
    </a>
    <a href="https://www.x.com/"class="service-link">
      <img src="{{ asset('images/2.png') }}" alt="2">
    </a>
    
    <a href="https://www.linkedin.com/"class="service-link">
      <img src="{{ asset('images/3.png') }}" alt="3">
    </a>
    
    <a href="https://www.instagram.com/"class="service-link">
      <img src="{{ asset('images/4.png') }}" alt="4">
    </a>
    
  </div>
    <div class="footer-separator"></div>

    <div class="footer-bottom">
      <div class="footer-links">
        <h4>Explore</h4>
        <ul>
          <li><a href={{ url('/landing') }}>Home</a></li>
          <li><a href={{ url('/aboutus') }}>About Us</a></li>
          <li><a href={{ url('/services') }}>Services</a></li>
          <li><a href={{ url('/contactus') }}>Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-contact">
        <h4>Keep in Touch</h4>
        <p>Mail: support@servicemarket.com</p>
        <p>Phone: (+22) 123 - 4567 - 900</p>
      </div>
    </div>
  </div>
</footer>