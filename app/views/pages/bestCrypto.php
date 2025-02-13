
<?php

$titre = 'Top 10 Cryptos';
ob_start();
?>


            <!-- Crypto List -->
            <div class="p-6">
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Top 10 Cryptocurrencies</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-gray-400 text-sm">
                                    <th class="text-left p-6">Rank</th>
                                    <th class="text-left">Cryptocurrency</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">24h Change</th>
                                    <th class="text-right">Market Cap</th>
                                    <th class="text-right p-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example row for Bitcoin -->
                                <tr class="border-t border-gray-800">
                                    <td class="p-6">1</td>
                                    <td>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-yellow-500/20 rounded-full flex items-center justify-center">
                                                <i class="fab fa-bitcoin text-yellow-500"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium">Bitcoin</div>
                                                <div class="text-gray-400 text-sm">BTC</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">$45,234.12</td>
                                    <td class="text-right text-green-500">+2.5%</td>
                                    <td class="text-right">$850B</td>
                                    <td class="p-6">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 rounded-lg bg-blue-500 hover:bg-blue-600 text-sm">Trade</button>
                                            <button class="px-3 py-1 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">View</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Example row for Ethereum -->
                                <tr class="border-t border-gray-800">
                                    <td class="p-6">2</td>
                                    <td>
                                        <div class="flex items-center space-x-3">
                                            <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                                <i class="fab fa-ethereum text-blue-500"></i>
                                            </div>
                                            <div>
                                                <div class="font-medium">Ethereum</div>
                                                <div class="text-gray-400 text-sm">ETH</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right">$3,456.78</td>
                                    <td class="text-right text-green-500">+3.2%</td>
                                    <td class="text-right">$400B</td>
                                    <td class="p-6">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 rounded-lg bg-blue-500 hover:bg-blue-600 text-sm">Trade</button>
                                            <button class="px-3 py-1 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">View</button>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Add more rows here for other top 10 cryptos -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>


        <?php

$content = ob_get_clean();


include_once 'layout.php';


?>