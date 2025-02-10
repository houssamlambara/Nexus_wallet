<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Nexus Crypto Wallet</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background: linear-gradient(135deg, #1e3a8a, #0f172a);
      font-family: 'Inter', sans-serif;
    }
    .glass {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      padding: 20px;
    }
  </style>
</head>
<body class="text-white">
  <!-- Navbar -->
  <nav class="p-6 glass flex justify-between items-center container mx-auto">
    <div class="text-2xl font-bold">Nexus Dashboard</div>
    <div class="flex space-x-6">
      <a href="#" class="hover:text-blue-400">Portfolio</a>
      <a href="#" class="hover:text-blue-400">Market</a>
      <a href="#" class="hover:text-blue-400">Settings</a>
      <a href="logout.html" class="btn-primary px-6 py-2 rounded-lg">Logout</a>
    </div>
  </nav>

  <!-- Portfolio Overview -->
  <section class="py-10 container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="glass p-6 text-center">
        <h2 class="text-3xl font-bold">Total Balance</h2>
        <p class="text-4xl font-semibold mt-4">$12,450.00</p>
        <p class="text-gray-300">Available USDT: $3,200.00</p>
      </div>
      <div class="glass p-6">
        <h2 class="text-xl font-bold mb-4">Your Cryptos</h2>
        <ul class="text-gray-300 space-y-2">
          <li>🔵 Bitcoin (BTC) - 0.5 BTC ($21,000)</li>
          <li>🟣 Ethereum (ETH) - 2 ETH ($3,200)</li>
          <li>🟢 Cardano (ADA) - 1,500 ADA ($750)</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Portfolio Statistics Chart -->
  <section class="py-10 container mx-auto">
    <div class="glass p-6">
      <h2 class="text-2xl font-bold text-center mb-4">Portfolio Performance</h2>
      <canvas id="portfolioChart"></canvas>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-8 bg-gray-800 text-center">
    <p class="text-gray-300">&copy; 2024 Nexus Crypto Wallet. All rights reserved.</p>
  </footer>

  <script>
    const ctx = document.getElementById('portfolioChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Portfolio Value ($)',
          data: [5000, 7000, 6500, 8000, 11000, 12450],
          borderColor: '#3b82f6',
          backgroundColor: 'rgba(59, 130, 246, 0.2)',
          borderWidth: 2,
          fill: true,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
      }
    });
  </script>
</body>
</html>