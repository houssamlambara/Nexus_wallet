
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
                                <!-- Example Row 1 -->
                                <tr class="hover:bg-gray-800">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center space-x-2">
                                            <img src="https://cryptologos.cc/logos/bitcoin-btc-logo.png" alt="Bitcoin" class="w-6 h-6">
                                            <span>Bitcoin (BTC)</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">$47,000</td>
                                    <td class="py-3 px-4">$880B</td>
                                    <td class="py-3 px-4">$34B</td>
                                    <td class="py-3 px-4">18.7M BTC</td>
                                    <td class="py-3 px-4">
                                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">
                                            Retirer
                                        </button>
                                    </td>
                                </tr>
                                <!-- Example Row 2 -->
                                <tr class="hover:bg-gray-800">
                                    <td class="py-3 px-4">
                                        <div class="flex items-center space-x-2">
                                            <img src="https://cryptologos.cc/logos/ethereum-eth-logo.png" alt="Ethereum" class="w-6 h-6">
                                            <span>Ethereum (ETH)</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4">$3,200</td>
                                    <td class="py-3 px-4">$380B</td>
                                    <td class="py-3 px-4">$22B</td>
                                    <td class="py-3 px-4">118.3M ETH</td>
                                    <td class="py-3 px-4">
                                        <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg">
                                            Ajouter
                                        </button>
                                    </td>
                                </tr>
                                <!-- Add more rows for other cryptos -->
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