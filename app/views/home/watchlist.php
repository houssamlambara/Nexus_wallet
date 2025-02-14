<?php session_start() ?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Watchlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-dark text-white">
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold mb-6">My Watchlist</h1>

    <?php if (!empty($data['watchlist'])): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($data['watchlist'] as $item): ?>
                <div class="bg-dark-light rounded-xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-800 relative">
                    <!-- Remove from Watchlist Button -->
                    <form action="<?php echo URLROOT . '/WatchlistController/removeFromWatchlist'; ?>" method="POST" class="absolute top-4 right-4">
                        <input type="hidden" name="crypto_id" value="<?php echo htmlspecialchars($item->crypto_id); ?>">
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors duration-300 focus:outline-none group">
                            <i class="fas fa-times text-xl group-hover:scale-110 transform transition-transform"></i>
                            <span class="sr-only">Remove <?php echo htmlspecialchars($item->crypto_name); ?> from watchlist</span>
                        </button>
                    </form>

                    <!-- Crypto Details -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <?php if (!empty($item->coin_image)): ?>
                                <img src="<?php echo htmlspecialchars($item->coin_image); ?>" alt="<?php echo htmlspecialchars($item->crypto_name); ?>" class="w-10 h-10 rounded-full">
                            <?php else: ?>
                                <div class="w-10 h-10 bg-blue-500/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-coins text-blue-500"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h3 class="font-bold text-white"><?php echo htmlspecialchars($item->crypto_name); ?></h3>
                                <span class="text-sm text-gray-400 uppercase"><?php echo htmlspecialchars($item->coin_symbol); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Price and Market Cap -->
                    <div class="flex justify-between items-center">
                        <div class="text-lg font-bold text-white">
                            $<?php echo number_format($item->coin_price, 2); ?>
                        </div>
                    </div>

                    <!-- Buy Button and Form -->
                    <form action="<?php echo URLROOT . '/WalletController/buyCrypto'; ?>" method="POST" class="mt-4">
                        <input type="hidden" name="crypto_id" value="<?php echo htmlspecialchars($item->crypto_id); ?>">
                        <input type="hidden" name="crypto_name" value="<?php echo htmlspecialchars($item->crypto_name); ?>">
                        <input type="hidden" name="crypto_price" value="<?php echo htmlspecialchars($item->coin_price); ?>">

                        <div class="flex items-center space-x-2">
                            <input type="number" name="amount_in_usdt" placeholder="Enter amount in USDT" class="w-full px-4 py-2 bg-gray-800 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" min="0.01" step="0.01" required>
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Buy
                            </button>
                        </div>
                    </form>

                    <!-- Additional Details -->
                    <?php if (!empty($item->created_at)): ?>
                        <div class="mt-4 pt-4 border-t border-gray-800">
                            <div class="text-sm text-gray-400">
                                Added on: <?php echo date('M d, Y', strtotime($item->created_at)); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="text-center py-10">
            <i class="fas fa-star text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-400">Your watchlist is empty. Add some cryptocurrencies to get started!</p>
        </div>
    <?php endif; ?>
</div>
</body>

</html>