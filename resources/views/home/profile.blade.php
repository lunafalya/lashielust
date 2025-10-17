@php
    $user = Auth::user();
@endphp

@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body class="solid-nav">

@section('content')


   <section class="profile-page-container">
        <div class="profile-content">
            
            <div class="profile-tabs">
                <a href="#" class="tab-item active">Profile</a>
                <a href="{{ url('/history') }}" class="tab-item inactive">Orders</a>
            </div>

            <div class="profile-avatar">
                @if($user && $user->profile_photo)
                    <img src="{{ asset('public/profiles' . $user->profile_photo) }}" width="80" height="80" style="border-radius: 50%">
                @else
                    <svg viewBox="0 0 24 24" fill="currentColor" width="80" height="80">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                @endif
            </div>

            <form class="profile-form">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" 
                        value="{{ $user ? $user->name : 'Your Name' }}" readonly>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" 
                        value="{{ $user ? $user->email : 'email@gmail.com' }}" readonly>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" 
                        value="{{ $user ? $user->phone : '+62 878 888 888' }}" readonly>
                </div>

                <a href="{{ route('profile.edit') }}">
                    <button type="button" class="edit-button">Edit Profile</button>
                </a>

            </form>

        </div>
    </section>

@endsection

<script>
    const editButton = document.querySelector('.edit-button');
    editButton.addEventListener('click', function() {
        window.location.href = "{{ url('/editprofile') }}";
    });
</script>

</body>
</html>