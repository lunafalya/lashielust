<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Lashie Lust</title>
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
      <h4 class="mb-3">Register</h4>
      <p class="text mb-4">Welcome to Lashie Lust, we hope your stay with us feels as bright as the morning sun.</p>

      <form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
          <label for="profile_photo" class="form-label">Profile Picture</label>
          <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-login w-100 py-2">Register</button>
      </form>

      <div class="login-footer mt-4 text-center">
        <p class="mb-1">Already have an account? <a href="{{ url('/login')}}">Login</a></p>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        timer: 2000,
        showConfirmButton: false
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: "Error!",
        text: "{{ session('error') }}",
        icon: "error",
        confirmButtonText: "OK"
    });
</script>
@endif
</body>
</html>