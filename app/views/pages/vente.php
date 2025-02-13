
<?php
session_start();
$titre = 'Vendre des Cryptos';
ob_start();
?>


            <!-- Crypto Sell Form -->
            <div class="p-6">
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Vendre des Cryptomonnaies contre USDT</h3>
                    </div>
                    <div class="px-6 py-4">
                        <form action="#" method="POST">
                            <div class="space-y-4">
                                <!-- Select Crypto -->
                                <div>
                                    <label for="crypto-select" class="block text-sm font-medium text-gray-300">Sélectionnez une crypto</label>
                                    <select id="crypto-select" name="crypto" class="block w-full mt-1 bg-dark-light border border-gray-700 text-white py-2 px-3 rounded-lg">
                                        <option value="BTC">Bitcoin (BTC)</option>
                                        <option value="ETH">Ethereum (ETH)</option>
                                        <option value="LTC">Litecoin (LTC)</option>
                                        <option value="ADA">Cardano (ADA)</option>
                                        <!-- Add more cryptos as needed -->
                                    </select>
                                </div>
                                
                                <!-- Amount to Sell -->
                                <div>
                                    <label for="amount" class="block text-sm font-medium text-gray-300">Montant à vendre (en crypto)</label>
                                    <input type="number" id="amount" name="amount" class="block w-full mt-1 bg-dark-light border border-gray-700 text-white py-2 px-3 rounded-lg" placeholder="Montant à vendre" required>
                                </div>
                                
                                <!-- Confirmation Button -->
                                <div class="mt-4">
                                    <button type="submit" class="w-full py-2 px-4 bg-primary text-white rounded-lg hover:bg-blue-600 transition-colors">
                                        Confirmer la vente
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>


        <?php

$content = ob_get_clean();


include_once 'layout.php';


?>