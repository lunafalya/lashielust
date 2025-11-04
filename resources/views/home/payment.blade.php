<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment - Lashie Lust</title>
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
        </div>
    </div>

    <div class="login-right">
      <h2 class="mb-3">Payment for {{ $service->name }}</h2>
        <p class="text mb-4">Amount: Rp{{ number_format($service->price, 0, ',', '.') }}</p>
       
        <button id="pay-button" class="btn btn-warning">Pay Now</button>
    
    </div>
  </div>
</div>

<script src="https://app.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href = '/service/{{ $service->id }}'; // balik ke detail service
            },
            onPending: function(result){
                alert("Payment pending");
            },
            onError: function(result){
                alert("Payment failed");
            },
            onClose: function(){
                alert('Payment popup closed');
            }
        });
    };
</script>
</body>
</html>