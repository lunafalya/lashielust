<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Lashie Lust</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="img/core-img/logo.png">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <link href="css/log.css" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">
  <div class="login-container shadow-lg">
    <div class="login-left">
      <div class="overlay"></div>
      <div class="text-content">
        <h2>We show your skin, hair,<br>and body the care and<br>attention they deserve.</h2>
        <p>Where Tranquility Meets Transformation.</p>
      </div>
    </div>

    <div class="login-right">
      <h4 class="mb-3">Login</h4>
      <p class="text mb-4">Welcome back, we are glad you're feeling beautiful today. Login to continue</p>

        <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required> <!-- TAMBAH name -->
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required> <!-- TAMBAH name -->
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember">
          <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn btn-login w-100 py-2">Login</button>
      </form>

        <div class="login-footer mt-4">
            <p class="mb-1">Don't have an account? <a href="{{ url('/register')}}">Register</a></p>
            <!-- <a href="{{ url('/forgotpassword')}}">Forgot Password?</a> -->
        </div>
    </div>
  </div>
</div>

    <!-- Popup Container -->
<div id="errorPopup" class="popup" style="display: none;">
    <p id="errorMessage"></p>
    <button onclick="closePopup()">Close</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('error'))
        showPopup("{{ session('error') }}");
    @endif
    });

    function showPopup(message) {
        const popup = document.getElementById('errorPopup');
        const messageText = document.getElementById('errorMessage');
        messageText.textContent = message;
        popup.style.display = 'block';
    }

    function closePopup() {
        document.getElementById('errorPopup').style.display = 'none';
    }
</script>
</body>
</html>
