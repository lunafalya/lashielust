@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile - Lashie Lust</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="img/core-img/logo.png">
</head>
<body class="solid-nav">
  
@section('content')
<section class="profile-page-container"> 
    <div class="profile-content">

        @php
            $user = Auth::user();
        @endphp

        <div class="profile-avatar">
            @if($user && $user->profile_photo)
                <img src="{{ asset('public/profiles' . $user->profile_photo) }}" width="80" height="80" style="border-radius: 50%; object-fit: cover;">
            @else
                <!-- Default icon jika belum ada foto -->
                <svg viewBox="0 0 24 24" fill="currentColor" width="80" height="80">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
          <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
                <div>
                    @if($user && $user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" width="80" height="80" style="border-radius:50%;object-fit:cover;">
                    @else
                    @endif
                </div>

                <div clase="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" value="{{ $user ? ($user->name ?? $user->name) : 'Your Name' }}">
                </div>

                <div clase="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $user ? $user->email : 'Your Email' }}">
                </div>

                <div clase="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" value="{{ $user ? $user->phone : 'Your Phone' }}">
                </div>

                <div clase="form-group">
                    <label>Profile Photo (PNG)</label>
                    <input type="file" name="profile_photo" accept="image/png">
                </div>

                <button type="submit">Save Change</button>
            </form>
    </div>
</section>
@endsection

<script>
    const saveButton = document.querySelector('.edit-button');
    saveButton.addEventListener('click', function() {
        window.location.href = "{{ url('/profile') }}";
    });
</script>

</body>
</html>