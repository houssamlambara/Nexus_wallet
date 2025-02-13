<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wallet</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.6"></script>
</head>
<body class="bg-gray-100">
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800">💰 My Wallet</h1>

    <!-- User Balance -->
    <div class="mt-4 bg-white shadow-lg p-6 rounded-lg">
        <h2 class="text-xl font-semibold">💵 Total Balance</h2>
        <p id="balance-section"  class="text-2xl font-bold text-green-600"><?= number_format($userBalance, 2) ?> USD</p>

        <!-- Deposit Form -->
        <form hx-post="walletController/depositWallet" hx-target="#balance-section" class="mt-4">
            <label class="block text-gray-700">Deposit Amount (USD):</label>
            <input type="number" name="amount" min="1" required class="w-full p-2 border rounded">
            <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Deposit
            </button>
        </form>
    </div>

    <!-- Static Cryptocurrencies -->
    <div class="mt-6">
        <h2 class="text-2xl font-semibold">📈 Top Cryptocurrencies</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($staticCryptos as $crypto): ?>
                <div class="p-4 bg-white shadow-lg rounded-lg">
                    <h2 class="text-xl font-semibold"><?= htmlspecialchars($crypto['name']) ?> (<?= htmlspecialchars($crypto['symbol']) ?>)</h2>
                    <p class="text-gray-600">Price: <span class="font-bold">$<?= number_format($crypto['price'], 2) ?></span></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- User Wallet -->
    <div class="mt-6">
        <h2 class="text-2xl font-semibold">💼 My Cryptos</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($wallets as $wallet): ?>
                <div class="p-4 bg-white shadow-lg rounded-lg">
                    <h2 class="text-xl font-semibold"><?= htmlspecialchars($wallet['name']) ?> (<?= htmlspecialchars($wallet['symbol']) ?>)</h2>
                    <p class="text-gray-600">Balance: <span class="font-bold"><?= number_format($wallet['balance'], 8) ?></span></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>
