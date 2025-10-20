@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body class="solid-nav">


@section('content')

<section class="review-page-container">
    <div class="review-content">
        
        <h2 class="review-title">Add Review</h2>

        <form class="review-form" action="{{ route('review.store') }}" method="POST">
            @csrf
            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
            <input type="hidden" name="service_id" value="{{ $booking->service->id }}">
            <input type="hidden" name="rating_value" id="ratingValue" value="4">

            <div class="form-group-review">
                <label class="review-label">Rating</label>
                <div class="rating-stars" id="starRating">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star" data-value="{{ $i }}">&#9733;</span>
                    @endfor
                </div>
            </div>

            <div class="form-group-review">
                <label class="review-label">Service</label>
                <input 
                    type="text" 
                    value="{{ $booking->service->name }}" 
                    readonly
                    class="service-input"
                >
            </div>

            <div class="form-group-review">
                <label class="review-label" for="review_text">Review</label>
                <textarea 
                    id="review_text" 
                    name="review_text" 
                    rows="6" 
                    placeholder="Write something..."
                    required
                ></textarea>
            </div>

            <button type="submit" class="submit-review-btn">Submit</button>
        </form>

    </div>
</section>

@endsection

<script>
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".rating-stars .star");
    const ratingInput = document.getElementById("ratingValue");

    stars.forEach((star, index) => {
        star.addEventListener("click", function () {
            // Set rating berdasarkan index (index mulai dari 0 → jadi +1)
            const rating = index + 1;
            ratingInput.value = rating; // update input hidden

            // Update tampilan bintang
            stars.forEach((s, i) => {
                if (i < rating) {
                    s.classList.add("active");
                } else {
                    s.classList.remove("active");
                }
            });
        });
    });
});
</script>


</body>
</html>