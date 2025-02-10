<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Nexus Crypto Wallet</title>
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
      <h1 class="text-3xl font-bold mb-2">Welcome Back</h1>
      <p class="text-gray-300">Login to access your Nexus Crypto Wallet</p>
    </div>
    <form id="loginForm" action='../login/login' type="submit">
      <div class="mb-6">
        <label for="email" class="block text-sm font-medium mb-2">Email</label>
        <input type="email" id="email" name="email" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter your email" required>
      </div>
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold">Login</button>
    </form>
    <div class="mt-6 text-center">
      <p class="text-gray-300">Don't have an account? <a href="signup.php" class="text-blue-400 hover:underline">Sign Up</a></p>
      <p class="mt-2 text-gray-300">Forgot your password? <a href="reset-password.html" class="text-blue-400 hover:underline">Reset it</a></p>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('A verification code has been sent to your email.');
      // Add logic to send 2FA code and handle login
    });
  </script>
</body>
</html>