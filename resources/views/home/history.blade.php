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
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->created_at->format('M d, Y, h:ia') }}</td>
                    <td>{{ $booking->service->name }}</td>
                    <td>
                        <span class="status {{ strtolower($booking->status) }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                        @if($booking->status == 'pending')
                            <a href="{{ route('payment.createPage', $booking->id) }}" 
                            class="btn btn-sm btn-warning" style="margin-left: 5px;">
                            Complete Payment
                            </a>
                        @endif
                    </td>
                    <td>
                        @if($booking->status == 'approved')
                            @if($booking->review)
                                <span class="review-status done">Review Added</span> {{-- Sudah review --}}
                            @else
                                <a href="{{ url('/review/'.$booking->id) }}" class="review-btn add">Add Review</a> {{-- Belum review --}}
                            @endif
                        @else
                            <span class="review-status">-</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</section>

@endsection

</body>
</html>