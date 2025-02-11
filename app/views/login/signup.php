<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Nexus Crypto Wallet</title>
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
  <div class="glass p-8 rounded-2xl shadow-2xl w-full max-w-2xl mx-4">
    <div class="text-center mb-8">
      <h1 class="text-3xl font-bold mb-2">Create Your Account</h1>
      <p class="text-gray-300">Join Nexus Crypto Wallet to manage your portfolio</p>
    </div>
    <form id="registerForm" action='index' method='post'>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- First Column -->
        <div>
          <div class="mb-4">
            <label for="firstName" class="block text-sm font-medium mb-2">First Name</label>
            <input type="text" id="firstName" name="firstName" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter your first name" required>
          </div>
          <div class="mb-4">
            <label for="lastName" class="block text-sm font-medium mb-2">Last Name</label>
            <input type="text" id="lastName" name="lastName" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter your last name" required>
          </div>
          <div class="mb-4">
            <label for="dob" class="block text-sm font-medium mb-2">Date of Birth</label>
            <input type="date" id="dob" name="dob" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" required>
          </div>
        </div>
        <!-- Second Column -->
        <div>
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter your email" required>
          </div>
          <div class="mb-6">
            <label for="password" class="block text-sm font-medium mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-3 input-field rounded-lg focus:outline-none" placeholder="Enter your password" required>
          </div>
        </div>
      </div>
      <button type="submit" class="w-full btn-primary text-white py-3 rounded-lg font-semibold">Sign Up</button>
    </form>
    <div class="mt-6 text-center">
      <p class="text-gray-300">Already have an account? <a href="login.php" class="text-blue-400 hover:underline">Login here</a></p>
    </div>
  </div>

  <script>
    // document.getElementById('registerForm').addEventListener('submit', function (e) {
    //   e.preventDefault();
    //   alert('Verification email sent! Please check your inbox.');
    //   // Add logic to send verification email and handle registration
    // });
  </script>
</body>
</html>
