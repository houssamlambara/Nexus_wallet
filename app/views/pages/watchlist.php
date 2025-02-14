<?php

$titre = 'Watchlist';
ob_start();
?>

    <!-- Watchlist Table -->
    <div class="p-6">
        <div class="bg-dark-light rounded-xl">
            <div class="p-6 border-b border-gray-800">
                <h3 class="font-bold">Cryptos Suivies</h3>
            </div>
            <div class="px-6 py-4">
                <table class="min-w-full table-auto text-sm">
                    <thead>
                    <tr class="text-gray-400">
                        <th class="py-3 px-4">Crypto</th>
                        <th class="py-3 px-4">Prix</th>
                        <th class="py-3 px-4">Market Cap</th>
                        <th class="py-3 px-4">Volume 24H</th>
                        <th class="py-3 px-4">Supply</th>
                        <th class="py-3 px-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($data['watchlist'])): ?>
                        <?php foreach ($data['watchlist'] as $item): ?>
                            <tr class="hover:bg-gray-800">
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-2">
                                        <?php if (!empty($item->coin_image)): ?>
                                            <img src="<?php echo htmlspecialchars($item->coin_image); ?>" alt="<?php echo htmlspecialchars($item->crypto_name); ?>" class="w-6 h-6">
                                        <?php else: ?>
                                            <div class="w-6 h-6 bg-blue-500/20 rounded-full flex items-center justify-center">
                                                <i class="fas fa-coins text-blue-500"></i>
                                            </div>
                                        <?php endif; ?>
                                        <span><?php echo htmlspecialchars($item->crypto_name); ?> (<?php echo htmlspecialchars($item->coin_symbol); ?>)</span>
                                    </div>
                                </td>
                                <td class="py-3 px-4">$<?php echo number_format($item->coin_price, 2); ?></td>
                                <td class="py-3 px-4">Market Cap Data</td> <!-- Replace with actual data if available -->
                                <td class="py-3 px-4">Volume 24H Data</td> <!-- Replace with actual data if available -->
                                <td class="py-3 px-4">Supply Data</td> <!-- Replace with actual data if available -->
                                <td class="py-3 px-4">
                                    <div class="flex space-x-2">
                                        <!-- Buy Form -->
                                        <form action="<?php echo URLROOT . '/achat/buyCrypto'; ?>" method="POST" class="flex items-center space-x-2">
                                            <input type="hidden" name="crypto_id" value="<?php echo htmlspecialchars($item->crypto_id); ?>">
                                            <input type="hidden" name="crypto_name" value="<?php echo htmlspecialchars($item->crypto_name); ?>">
                                            <input type="hidden" name="crypto_price" value="<?php echo htmlspecialchars($item->coin_price); ?>">

                                            <!-- Amount Input -->
                                            <input type="number" name="amount_in_usdt" placeholder="Amount in USDT" class="w-24 px-2 py-1 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" min="0.01" step="0.01" required>

                                            <!-- Buy Button -->
                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-1 px-4 rounded-lg transition-colors duration-300">
                                                Buy
                                            </button>
                                        </form>

                                        <!-- Remove Button -->
                                        <form action="<?php echo URLROOT . '/WatchlistController/removeFromWatchlist'; ?>" method="POST">
                                            <input type="hidden" name="crypto_id" value="<?php echo htmlspecialchars($item->crypto_id); ?>">
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-lg transition-colors duration-300">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="py-6 text-center text-gray-400">
                                <i class="fas fa-star text-4xl mb-4"></i>
                                <p>Your watchlist is empty. Add some cryptocurrencies to get started!</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<?php
$content = ob_get_clean();
include_once 'layout.php';
?>