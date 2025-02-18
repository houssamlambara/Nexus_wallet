<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify OTP - Nexus Crypto Wallet</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #1e3a8a, #0f172a);
      font-family: 'Inter', sans-serif;
    }
    .glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .input-field {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: all 0.3s ease;
    }
    .input-field:focus {
      background: rgba(255, 255, 255, 0.2);
      border-color: #3b82f6;
    }
    .btn-primary {
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
    }
  </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen">
  <div class="glass p-8 rounded-2xl shadow-2xl w-full max-w-md mx-4">
    <div class="text-center mb-8">
      <h1 class="text-3xl font-bold mb-2">Verify OTP</h1>
      <p class="text-gray-300">Enter the OTP sent to your email to complete the verification</p>
    </div>
    <form method="post" id="otpForm" action="../homeController/verifyEmail" type="submit">
    <div class="mb-6">
        <label for="email" class="block text-sm font-medium mb-2">Email</label>
        <input type="text" id="email" name="email" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter the email" required>
      </div>
      <div class="mb-6">
        <label for="otp" class="block text-sm font-medium mb-2">OTP Code</label>
        <input type="text" id="otp" name="otp" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter the 6-digit OTP" required maxlength="6">
      </div>
      <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold" name='submit'>Verify OTP</button>
    </form>
  </div>


</body>
</html>

<?php

if(isset($_SESSION['success'])){
    $message = $_SESSION['success'];
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'success',
                text: '$message',
                confirmButtonText: 'OK',
                timer: 5000
            });
        </script>
    ";
    unset($_SESSION['success']);
}
?>

<?php

if(isset($_SESSION['error'])){
    $message = $_SESSION['error'];
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'error',
                text: '$message',
                confirmButtonText: 'OK',
                timer: 5000
            });
        </script>
    ";
    unset($_SESSION['error']);
}
?>
