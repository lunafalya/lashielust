@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body>
  
@section('content')
      <!-- CONTACT US -->
      <section id="contactus" class="home1">
      <div class="home-content1">
      <img src="{{ asset('images/contactus.png') }}" alt="contactus">
    </div>
  </section>

  <section class="contact-section">
    <div class="contact-container">
        <div class="contact-image-area">
            <div class="image-shadow-bg"></div>
            {{-- Sesuaikan path gambar Anda --}}
            <img src="{{ asset('images/serviceshair.png') }}" alt="Model with beautiful hair" class="contact-main-image">
        </div>

        <div class="contact-content">
        <img src="{{ asset('images/getintouch.png') }}" alt="getintouch">
        </div>
    </div>
</section>

  <section class="form-section">
    <div class="form-header">
        <img src="{{ asset('images/getintouchwithus.png') }}" alt="getintouchwithus">
    </div>
    
    <div class="form-card-wrapper">
        <form action="#" method="POST" class="contact-form">
            <div class="input-group">
                <img src="{{ asset('images/user.png') }}" alt="user">
                <input type="text" name="name" placeholder="Name" required>
            </div>

            <div class="input-group">
                <img src="{{ asset('images/mail.png') }}" alt="mail">
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <img src="{{ asset('images/phone.png') }}" alt="phone">
                <input type="tel" name="phone" placeholder="Phone">
            </div>

            <div class="input-group textarea-group">
                <img src="{{ asset('images/edit.png') }}" alt="edit">
                <textarea name="message" placeholder="Any Note For Us" rows="1" required></textarea>
            </div>

            <button type="submit" class="submit-btn">SUBMIT</button>
        </form>
    </div>
  </section>

 @endsection

</body>
</html>