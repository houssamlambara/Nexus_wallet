

<?php


ob_start();
?>

        <!-- Main Content -->
        <main class="ml-64 flex-1 min-h-screen">
            <!-- Top Navigation -->
            <header class="bg-dark-light border-b border-gray-800 sticky top-0 z-50">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-xl font-bold">Réception de Cryptos</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 hover:bg-gray-800 rounded-lg text-gray-400 hover:text-white transition-colors">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="flex items-center space-x-2">
                            <img src="/api/placeholder/32/32" alt="Profile" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium">John Doe</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Received Cryptos Section -->
            <div class="p-6">
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Cryptos Reçues</h3>
                    </div>
                    <div class="px-6 py-4">
                        <ul class="space-y-4">
                            <!-- Received Crypto List -->
                            <li class="flex justify-between items-center p-4 bg-gray-800 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-bitcoin text-2xl text-yellow-500"></i>
                                    <span class="text-lg font-medium">Bitcoin (BTC)</span>
                                </div>
                                <div>
                                    <span class="text-sm text-green-400">+ 0.5 BTC</span>
                                    <p class="text-sm text-gray-400">Date: 2025-02-10</p>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-4 bg-gray-800 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-ethereum text-2xl text-indigo-500"></i>
                                    <span class="text-lg font-medium">Ethereum (ETH)</span>
                                </div>
                                <div>
                                    <span class="text-sm text-green-400">+ 2.0 ETH</span>
                                    <p class="text-sm text-gray-400">Date: 2025-02-09</p>
                                </div>
                            </li>
                            <li class="flex justify-between items-center p-4 bg-gray-800 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-litecoin text-2xl text-silver-400"></i>
                                    <span class="text-lg font-medium">Litecoin (LTC)</span>
                                </div>
                                <div>
                                    <span class="text-sm text-green-400">+ 5.5 LTC</span>
                                    <p class="text-sm text-gray-400">Date: 2025-02-08</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Notifications Section -->
            <div class="p-6 mt-8">
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Notifications</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div class="flex items-center p-4 bg-gray-800 rounded-lg">
                            <i class="fas fa-bell text-xl text-primary"></i>
                            <div class="ml-4">
                                <p class="font-medium">Transaction de 0.5 BTC reçue.</p>
                                <p class="text-sm text-gray-400">Date: 2025-02-10</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-800 rounded-lg">
                            <i class="fas fa-bell text-xl text-primary"></i>
                            <div class="ml-4">
                                <p class="font-medium">2.0 ETH ont été reçus.</p>
                                <p class="text-sm text-gray-400">Date: 2025-02-09</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-gray-800 rounded-lg">
                            <i class="fas fa-bell text-xl text-primary"></i>
                            <div class="ml-4">
                                <p class="font-medium">5.5 LTC ajoutés à votre portefeuille.</p>
                                <p class="text-sm text-gray-400">Date: 2025-02-08</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>



        <?php

$content = ob_get_clean();


include_once 'layout.php';


?>