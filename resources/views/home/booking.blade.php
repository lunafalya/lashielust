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
                <form action="{{ route('bookings.store') }}" method="POST" class="appointment-form">
                    @csrf
                    
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="hidden" name="service_id" value="{{ $service->id }}">

                    <div class="input-row">
                        <label style="font-weight: 400; color: white; text-align: left;">Name : <input type="text" name="name" value="{{ $user->name }}" readonly></label>
                        <label style="font-weight: 400; color: white; text-align: left;">Email : <input type="email" name="email" value="{{ $user->email }}" readonly></label>
                    </div>

                    <div class="input-row">
                        <label style="font-weight: 400; color: white; text-align: left;">Phone : <input type="text" name="phone" value="{{ $user->phone }}" readonly></label>
                        <label style="font-weight: 400; color: white; text-align: left;">Category : <input type="text" name="category" value="{{ $service->category }}" readonly></label>
                    </div>

                    <div class="input-row">
                        <label style="font-weight: 400; color: white; text-align: left;">Booking Date : <input type="date" id="booking_date" name="booking_date" required></label>
                        <label style="font-weight: 400; color: white; text-align: left;">Booking Time : 
                            <select name="booking_time" id="booking_time" required>
                                <option disabled selected>Choose Your Time</option>
                                <option value="08.00-10.00">08.00-10.00</option>
                                <option value="10.00-12.00">10.00-12.00</option>
                                <option value="12.00-14.00">12.00-14.00</option>
                                <option value="14.00-16.00">14.00-16.00</option>
                            <option value="16.00-18.00">16.00-18.00</option>
                        </select>
                    </div>

                    <div class="input-row">
                        <label style="font-weight: 400; color: white; text-align: left;">Price : Rp.{{ number_format($service->price, 0, ',', '.') }}</label>
                    </div>

                    <textarea name="notes" placeholder="Any Notes For Us"></textarea>
                    <button type="submit" class="book-now-btn">Proceed to Payment</button>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const dateInput = document.getElementById('booking_date');
    const timeSelect = document.getElementById('booking_time');

    dateInput.addEventListener('change', function() {

        let date = this.value;
        let serviceId = "{{ $service->id }}";

        // Reset option
        timeSelect.querySelectorAll("option").forEach(opt => {
            opt.disabled = false;
            opt.textContent = opt.value;
        });

        fetch(`/bookings/check?service_id=${serviceId}&booking_date=${date}`)
            .then(response => response.json())
            .then(data => {

                data.forEach(time => {
                    let opt = timeSelect.querySelector(`option[value="${time}"]`);
                    if (opt) {
                        opt.disabled = true;
                        opt.textContent = `${time} (Booked)`;
                    }
                });

                if (data.length >= 5) {
                    Swal.fire({
                        icon: "warning",
                        title: "Fully Booked",
                        text: "Semua jam di tanggal ini sudah penuh. Silakan pilih tanggal lain.",
                    });
                }
            });
    });

    timeSelect.addEventListener('change', function () {
        let opt = this.options[this.selectedIndex];

        if (opt.disabled) {
            Swal.fire({
                icon: "error",
                title: "Jam Sudah Dibooking",
                text: "Silakan pilih waktu lain.",
            });

            this.selectedIndex = 0;
        }
    });

});
</script>

</body>
</html>