@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
    
</head>
<body>
@section('content')
  <!-- HOME -->
  <section id="home" class="home">
    <div class="home-content">
      <img src="{{ asset('images/home1.png') }}" alt="home1">
      <p>At Lashie Lust, we create beauty experiences that match your style; effortless, confident, and uniquely you.</p>
      <a href={{ url('/services') }} class="btn">Book Appointment Now</a>
    </div>
  </section>

  <!-- ABOUT US -->
  <section id="aboutus" class="about-section">
    <div class="about-container">
      <div class="about-text">
        <img src="{{ asset('images/aboutus1.png') }}" alt="aboutus1">
        <p>
          At Lashie Lust, we believe every pair of eyes tells a beautiful story.
          Our mission is to help you express confidence and charm through lashes that look natural and feel comfortable.
          With skilled lash artists and high-quality materials, we bring elegance to every blink — so you can shine effortlessly every day.
        </p>
      </div>


      <div class="about-gallery">
        <div class="item item1"><img src="{{ asset('images/about1.jpg') }}" alt=""></div>
        <div class="item item2"><img src="{{ asset('images/about2.jpg') }}" alt=""></div>
        <div class="item item3"><img src="{{ asset('images/about3.jpg') }}" alt=""></div>
        <div class="item item4"><img src="{{ asset('images/about4.jpg') }}" alt=""></div>
        <div class="item item5"><img src="{{ asset('images/about5.jpg') }}" alt=""></div>
      </div>
    </div>
  </section>

  <!-- OUR SERVICES -->
  <section id="service" class="services">
    <div class="section-header">
      <img src="{{ asset('images/ourservice1.png') }}" alt="ourservice1">
    </div>

    <div class="carousel-container">
      <!-- <button class="carousel-btn prev">&#10094;</button> -->
      <div class="carousel">
        <div class="card">
          <a href="{{ url('/services') }}">
            <img src="{{ asset('images/hairy.jpeg') }}" alt="Hair">
            <p>Hair</p>
          </a>
          
        </div>
        <div class="card">
          <a href="{{ url('/services') }}">
            <img src="{{ asset('images/piercing.jpeg') }}" alt="Face">
          <p>Piercing</p>
          </a>
          
        </div>
        <div class="card">
          <a href="{{ url('/services') }}">
            <img src="{{ asset('images/lashie.jpeg') }}" alt="Body">
            <p>Eyes</p>
          </a>
          
        </div>
        <div class="card">
          <a href="{{ url('/services') }}">
            <img src="{{ asset('images/nailart.jpeg') }}" alt="Nails">
            <p>Nails</p>
          </a>
          
        </div>
        <div class="card">
          <a href="{{ url('/services') }}">
            <img src="{{ asset('images/Spa.jpeg') }}" alt="Massage">
          <p>Body</p>
          </a>
          
        </div>
      </div>
      <!-- <button class="carousel-btn next">&#10095;</button> -->
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section id="testi" class="testimonials">
    <img src="{{ asset('images/testimonials.png') }}" alt="testimonials">
    <div class="testimonial-list">
      <div class="testimonial">
        <img src="{{ asset('images/kutip.png') }}" alt="kutip" class="quote-icon" >
        <p>“Absolutely love my lashes! They’re soft, natural-looking, and last for weeks!”</p>
        <span>- Rina S., Bekasi</span>
      </div>
      <div class="testimonial">
        <img src="{{ asset('images/kutip.png') }}" alt="kutip" class="quote-icon">
        <p>“Such a relaxing experience! The staff were super friendly and my lashes turned out perfect”</p>
        <span>- Luna, Bogor</span>
      </div>
      <div class="testimonial">
        <img src="{{ asset('images/kutip.png') }}" alt="kutip" class="quote-icon">
        <p>“These are the best extensions I’ve ever had — lightweight and long-lasting. Totally worth it!”</p>
        <span>- Putri, Depok</span>
      </div>
    </div>
  </section>
  @endsection



  <script>
    const carousel = document.querySelector('.carousel');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const prevBtn = document.querySelector('.carousel-btn.prev');

    const scrollStep = 350;

    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: scrollStep, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: -scrollStep, behavior: 'smooth' });
    });
  </script>

  <script>
  const profileBtn = document.getElementById('profileBtn');
  const dropdownMenu = document.getElementById('dropdownMenu');

  profileBtn.addEventListener('click', function (event) {
    event.stopPropagation();
    dropdownMenu.classList.toggle('show');
  });

  window.addEventListener('click', function (event) {
    if (!dropdownMenu.contains(event.target) && event.target !== profileBtn) {
      dropdownMenu.classList.remove('show');
    }
  });
</script>

</body>
</html>