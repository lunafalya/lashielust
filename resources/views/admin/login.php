@extends('layouts.guest')
@php
    $user = Auth::user();
@endphp

@section('content')
<div class="login-container">
    {{-- Sisi Kiri: Gambar Background dengan Overlay Text --}}
    <div class="login-left-side">
        <div class="left-side-content">
            <h2>We show your skin, hair, and body the care and attention they deserve.</h2>
            <p>Where Tranquility Meets Transformation.</p>
        </div>
    </div>

    {{-- Sisi Kanan: Form Login --}}
    <div class="login-right-side">
        <h2>Login</h2>
        <p class="lead">Welcome back, we are glad you're feeling beautiful today. Login to continue</p>

        <form>
            <div class="mb-3">
                {{-- Input Email --}}
                <input type="email" class="form-control" placeholder="Email">
            </div>

            <div class="mb-4">
                {{-- Input Password --}}
                <input type="password" class="form-control" placeholder="Password">
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    {{-- Checkbox Remember Me --}}
                    <input class="form-check-input" type="checkbox" id="remember_me">
                    <label class="form-check-label" for="remember_me">
                        Remember me
                    </label>
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login">Login</button>
            </div>

            <div class="text-center right-side-links">
                <p>Don't have an account? <a href="#">Register</a></p>
                <a href="#">Forgot Password?</a>
            </div>
        </form>
    </div>
</div>

@endsection