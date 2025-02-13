
<?php
session_start();
$titre = 'Transaction History';
ob_start();
?>



            <!-- Transaction History Table -->
            <div class="p-6">
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Historique des Transactions</h3>
                    </div>
                    <div class="px-6 py-4">
                        <table class="min-w-full table-auto text-sm">
                            <thead>
                                <tr class="text-gray-400">
                                    <th class="py-3 px-4">Type</th>
                                    <th class="py-3 px-4">Date</th>
                                    <th class="py-3 px-4">Montant</th>
                                    <th class="py-3 px-4">Crypto</th>
                                    <th class="py-3 px-4">Statut</th>
                                    <th class="py-3 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Example Row 1 -->
                                <tr class="hover:bg-gray-800">
                                    <td class="py-3 px-4">Achat</td>
                                    <td class="py-3 px-4">2025-02-01 12:34</td>
                                    <td class="py-3 px-4">$1,000</td>
                                    <td class="py-3 px-4">Bitcoin (BTC)</td>
                                    <td class="py-3 px-4 text-green-500">Complété</td>
                                    <td class="py-3 px-4">
                                        <button class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                                            Détails
                                        </button>
                                    </td>
                                </tr>
                                <!-- Example Row 2 -->
                                <tr class="hover:bg-gray-800">
                                    <td class="py-3 px-4">Vente</td>
                                    <td class="py-3 px-4">2025-02-03 15:22</td>
                                    <td class="py-3 px-4">$2,500</td>
                                    <td class="py-3 px-4">Ethereum (ETH)</td>
                                    <td class="py-3 px-4 text-yellow-500">En attente</td>
                                    <td class="py-3 px-4">
                                        <button class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                                            Détails
                                        </button>
                                    </td>
                                </tr>
                                <!-- Example Row 3 -->
                                <tr class="hover:bg-gray-800">
                                    <td class="py-3 px-4">Envoi</td>
                                    <td class="py-3 px-4">2025-02-05 09:15</td>
                                    <td class="py-3 px-4">$500</td>
                                    <td class="py-3 px-4">Litecoin (LTC)</td>
                                    <td class="py-3 px-4 text-red-500">Échoué</td>
                                    <td class="py-3 px-4">
                                        <button class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg">
                                            Détails
                                        </button>
                                    </td>
                                </tr>
                                <!-- Add more rows for other transactions -->
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