<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password - Lashie Lust</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
      <h4 class="mb-3">Reset Password</h4>
      <p class="text mb-4">Welcome to Lashie Lust, we hope your stay with us feels as bright as the morning sun.</p>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-login w-100 py-2">Reset</button>
      </form>

    </div>
  </div>
</div>

</body>
</html>