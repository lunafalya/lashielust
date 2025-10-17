@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About-us</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="img/core-img/logo.png">
</head>
<body>
     @section('content')
  <section id="aboutus" class="about-section">
    <div class="about-container">
      <div class="about-text">
        <img src="{{ asset('images/aboutus1.png') }}" alt="aboutus1">
        <p>
          Eleifend arcu non lorem justo in tempus purus gravida. Est tortor egestas sed feugiat elementum.
          Vivamus nulla amet a ultrices massa dui. Tortor est purus morbi vitae arcu suspendisse amet.
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
   @endsection
</body>
</html>