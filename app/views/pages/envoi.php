<?php


ob_start();
?>

        <!-- Main Content -->
        <main class="ml-64 flex-1 min-h-screen">
            <!-- Top Navigation -->
            <header class="bg-dark-light border-b border-gray-800 sticky top-0 z-50">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-xl font-bold">Envoyer des Cryptos</h1>
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

            <!-- Crypto Send Form -->
            <div class="p-6">
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Envoyer des Cryptomonnaies</h3>
                    </div>
                    <div class="px-6 py-4">
                        <form action="http://localhost/Nexus_wallet/envoiController/sendUsdt" method="POST">
                            <div class="space-y-4">
                                <!-- Recipient NexusID or Email -->
                                <div>
                                    <label for="recipient" class="block text-sm font-medium text-gray-300">NexusID ou Email du destinataire</label>
                                    <input type="text" id="recipient" name="recipient" class="block w-full mt-1 bg-dark-light border border-gray-700 text-white py-2 px-3 rounded-lg" placeholder="Entrez NexusID ou Email" required>
                                </div>
                                
                                <!-- Select Crypto -->
                                <div>
                                    <label for="crypto-select" class="block text-sm font-medium text-gray-300">Sélectionnez une crypto</label>
                                    <select id="crypto-select" name="crypto" class="block w-full mt-1 bg-dark-light border border-gray-700 text-white py-2 px-3 rounded-lg">
                                        <option value="BTC">Bitcoin (BTC)</option>
                                        <option value="ETH">Ethereum (ETH)</option>
                                        <option value="LTC">Litecoin (LTC)</option>
                                        <option value="USDT">USDT (USDT)</option>
                                        <!-- Add more cryptos as needed -->
                                    </select>
                                </div>
                                
                                <!-- Amount to Send -->
                                <div>
                                    <label for="amount" class="block text-sm font-medium text-gray-300">Montant à envoyer (en crypto)</label>
                                    <input type="number" id="amount" name="amount" class="block w-full mt-1 bg-dark-light border border-gray-700 text-white py-2 px-3 rounded-lg" placeholder="Montant à envoyer" required>
                                </div>


                                <!-- Confirm Send Button -->
                                <div class="mt-4">
                                    <button name="send" type="submit" class="w-full py-2 px-4 bg-primary text-white rounded-lg hover:bg-blue-600 transition-colors">
                                        Confirmer l'envoi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <?php

                    // if(isset($_SESSION['alert'])){
                    //     $getArr = $_SESSION['alert'];
                    //     if($getArr[0] === 'success'){
                    //         echo '<span class="text-red-600">'.$getArr[1].'</span>';
                    //         unset($_SESSION['alert']);
                    //     }elseif($getArr[1] === 'success'){
                    //         echo '<span class="text-green-600">'.$getArr[1].'</span>';
                    //         unset($_SESSION['alert']);
                    //     }else{
                    //         echo '<span class="text-green-600">hi</span>';

                    //     }
                    // }


                    ?>
        </main>

    <script>
        // JavaScript to update the verification section dynamically
        const recipientInput = document.getElementById('recipient');
        const cryptoSelect = document.getElementById('crypto-select');
        const amountInput = document.getElementById('amount');
        const recipientDisplay = document.getElementById('recipient-display');
        const cryptoDisplay = document.getElementById('crypto-display');
        const amountDisplay = document.getElementById('amount-display');

        recipientInput.addEventListener('input', updateVerification);
        cryptoSelect.addEventListener('change', updateVerification);
        amountInput.addEventListener('input', updateVerification);

        function updateVerification() {
            recipientDisplay.textContent = recipientInput.value;
            cryptoDisplay.textContent = cryptoSelect.options[cryptoSelect.selectedIndex].text;
            amountDisplay.textContent = amountInput.value;
        }

        updateVerification();  // Initial update
    </script>
        <?php

$content = ob_get_clean();


include_once 'layout.php';


?>