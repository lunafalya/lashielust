@php
    $user = Auth::user();
@endphp


@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body>
 @section('content')

<section class="booking-hero" style="background-image: url('images/hero.jpg');">
        <div class="booking-card">
            <h2 class="form-title">Lashie Lust Appointment Form</h2>
            <p class="form-subtitle">Please fill the form below, it will only take 3 minutes</p>

            <form class="appointment-form">
                
                <div class="input-row">
                    <input type="text" id="name" name="name" 
                        value="{{ $user ? $user->name : 'Your Name' }}" readonly>
                    <input type="email" id="email" name="email" 
                        value="{{ $user ? $user->email : 'email@gmail.com' }}" readonly>
                </div>

                <div class="input-row">
                    <input type="text" id="phone" name="phone" 
                        value="{{ $user ? $user->phone : '+62 878 888 888' }}" readonly>
                    <div class="select-wrapper">
                        <select>
                            <option value="" disabled selected>Select Type</option>
                            <option value="eyelash">Eyelash Extension</option>
                            <option value="hair">Hair Treatment</option>
                            <option value="nail">Nail Art</option>
                            <option value="nail">Piercing</option>
                            <option value="nail">Body Massage</option>
                        </select>
                        <i class="fa-solid fa-chevron-down select-icon"></i>
                    </div>
                </div>

                <div class="input-row">
    <div class="input-date-wrapper">
         <input type="date"> 
</div>
    
    <div class="select-wrapper">
        <select>
            <option value="" disabled selected>Choose Your Time</option>
            <option value="8">08.00-10.00</option>
            <option value="10">10.00-12.00</option>
            <option value="12">12.00-14.00</option>
            <option value="14">14.00-16.00</option>
            <option value="16">16.00-18.00</option>
            </select>
        <i class="fa-solid fa-chevron-down select-icon"></i>
    </div>
</div>

                <textarea placeholder="Any Notes For Us"></textarea>

                <button type="submit" class="book-now-btn">Book Now</button>
            </form>
        </div>
    </section>

@endsection


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