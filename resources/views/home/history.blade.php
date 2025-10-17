@extends('layouts.app')

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body class="solid-nav">


@section('content')
   <section class="profile-page-container">
        <div class="profile-content">
            
            <div class="profile-tabs">
                <a href="{{ url('/profile') }}" class="tab-item inactive">Profile</a>
                <a href="#" class="tab-item active">Orders</a>
            </div>

<div class="orders-history-container">
    <h2 class="history-title">History</h2>
    
    <table class="history-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Transaction Date</th>
                <th>Service</th>
                <th>Status</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>456789356</td>
                <td>Sep 9, 2024, 04:30pm</td>
                <td>Lash Lift</td>
                <td><span class="status pending">Pending</span></td>
                <td><button class="review-btn add">Add Review</button></td>
            </tr>
            <tr>
                <td>456789356</td>
                <td>Sep 8, 2024, 03:13pm</td>
                <td>Nail Art</td>
                <td><span class="status cancelled">Cancelled</span></td>
                <td><span class="review-status added">Review Added</span></td>
            </tr>
            <tr>
                <td>456789356</td>
                <td>Sep 8, 2024, 03:13pm</td>
                <td>Nail Art</td>
                <td><span class="status completed">Completed</span></td>
                <td><span class="review-status added">Review Added</span></td>
            </tr>
        </tbody>
    </table>
</div>
</section>

@endsection

</body>
</html>