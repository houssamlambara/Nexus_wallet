

<?php

$titre = 'Réception de Cryptos';
ob_start();
?>



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