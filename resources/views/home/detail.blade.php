@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body class="detail-page"> 


@section('content')
  <section class="detail-section">
    <div class="detail-container">


    <div class="detail-image-area">
    <img src="{{ asset('storage/' . $service->file_path) }}" alt="{{ $service->name }}" class="main-product-image">
</div>

            <div class="detail-content">
                <p class="service-brand">Lashie Lust</p>
                <h1 class="service-title">{{ $service->name }}</h1>
                <p class="service-price">Start From Rp {{ number_format($service->price, 0, ',', '.') }}</p>

                <button class="book-now-btn" id="bookNowButton">Book Now</button>

                <div class="tab-navigation">
                    <span class="tab-item active" data-tab="description">Description</span>
                    <span class="tab-item" data-tab="review">Review</span>
                </div>

                <div class="tab-content active" id="description-content">
                    <p class="content-text">{{ $service->description }}</p>
                </div>
            </div>

            <div class="tab-content" id="review-content">
                <div class="review-item">
                    <p class="reviewer-name">Elena</p>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="review-text">
                        "Eleifend arcu non lorem justo in tempus purus gravida. Est tortor 
                        egestas sed feugiat elementum. Viverra nulla amet a ultrices 
                        massa dui. Tortor est purus morbi vitae arcu suspendisse amet."
                    </p>
                </div>
                </div>

                
            
        </div>
    </div>
  </section>
@endsection

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabItems = document.querySelectorAll('.tab-item');
        const tabContents = document.querySelectorAll('.tab-content');

        tabItems.forEach(item => {
            item.addEventListener('click', function() {
                tabItems.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                const targetTab = this.getAttribute('data-tab');
                tabContents.forEach(content => content.classList.remove('active'));
                document.getElementById(targetTab + '-content').classList.add('active');
            });
        });

        document.getElementById('bookNowButton').addEventListener('click', function() {
            window.location.href = '{{ url("/booking") }}'; 
        });
    });

    const profileBtn = document.getElementById('profileBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');
    
    if(profileBtn && dropdownMenu) {
        profileBtn.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });
        window.onclick = function(event) {
            if (!event.target.matches('#profileBtn')) {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                }
            }
        }
    }
  </script>

</body>
</html>