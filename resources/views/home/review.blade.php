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

        <form class="review-form">
            
            <div class="form-group-review">
                <label class="review-label">Rating</label>
                <div class="rating-stars">
                    <span class="star active">&#9733;</span> 
                    <span class="star active">&#9733;</span>
                    <span class="star active">&#9733;</span>
                    <span class="star active">&#9733;</span>
                    <span class="star">&#9733;</span>
                </div>
                <input type="hidden" name="rating_value" id="ratingValue" value="4"> 
            </div>

            <div class="form-group-review">
                <label class="review-label" for="service_name">Services</label>
                <input 
                    type="text" 
                    id="service_name" 
                    name="service_name" 
                    value="(ini gbs diedit2 ya ngambil id servicenya)" 
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
                    placeholder="Zzz"
                ></textarea>
            </div>

            <button type="submit" class="submit-review-btn">Submit</button>
        </form>

    </div>
</section>

@endsection

</body>
</html>