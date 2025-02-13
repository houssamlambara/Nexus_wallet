
<?php

$titre = 'Dashboard';
ob_start();
?>


            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Portfolio Overview -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-dark-light p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-400">Total Balance</h3>
                            <i class="fas fa-wallet text-blue-500"></i>
                        </div>
                        <div class="text-2xl font-bold">$45,231.89</div>
                        <div class="text-green-500 text-sm">+2.5% today</div>
                    </div>

                    <div class="bg-dark-light p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-400">24h Volume</h3>
                            <i class="fas fa-chart-bar text-purple-500"></i>
                        </div>
                        <div class="text-2xl font-bold">$12,456.78</div>
                        <div class="text-green-500 text-sm">+5.2% today</div>
                    </div>

                    <div class="bg-dark-light p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-400">Active Orders</h3>
                            <i class="fas fa-list text-yellow-500"></i>
                        </div>
                        <div class="text-2xl font-bold">8</div>
                        <div class="text-gray-400 text-sm">Last updated 5m ago</div>
                    </div>

                    <div class="bg-dark-light p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-gray-400">Total Profit</h3>
                            <i class="fas fa-chart-line text-green-500"></i>
                        </div>
                        <div class="text-2xl font-bold">$3,567.32</div>
                        <div class="text-green-500 text-sm">+12.3% this month</div>
                    </div>
                </div>

                <!-- Chart and Orders -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
                    <!-- Price Chart -->
                    <div class="lg:col-span-2 bg-dark-light p-6 rounded-xl">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold">Price Chart</h3>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 rounded-lg bg-blue-500/10 text-blue-500 text-sm">1H</button>
                                <button class="px-3 py-1 rounded-lg hover:bg-gray-800 text-gray-400 text-sm">1D</button>
                                <button class="px-3 py-1 rounded-lg hover:bg-gray-800 text-gray-400 text-sm">1W</button>
                                <button class="px-3 py-1 rounded-lg hover:bg-gray-800 text-gray-400 text-sm">1M</button>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div class="bg-dark-light p-6 rounded-xl">
                        <h3 class="font-bold mb-6">Recent Orders</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-dark rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                        <i class="fas fa-arrow-up text-green-500 text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">Buy BTC</div>
                                        <div class="text-gray-400 text-sm">0.0234 BTC</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-medium">$1,234.56</div>
                                    <div class="text-gray-400 text-sm">2 min ago</div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-dark rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-red-500/20 rounded-full flex items-center justify-center">
                                        <i class="fas fa-arrow-down text-red-500 text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">Sell ETH</div>
                                        <div class="text-gray-400 text-sm">1.5 ETH</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-medium">$2,856.12</div>
                                    <div class="text-gray-400 text-sm">5 min ago</div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-dark rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                        <i class="fas fa-arrow-up text-green-500 text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium">Buy SOL</div>
                                        <div class="text-gray-400 text-sm">15 SOL</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-medium">$945.00</div>
                                    <div class="text-gray-400 text-sm">12 min ago</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Assets Table -->
                <div class="bg-dark-light rounded-xl">
                    <div class="p-6 border-b border-gray-800">
                        <h3 class="font-bold">Your Assets</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-gray-400 text-sm">
                                    <th class="text-left p-6">Asset</th>
                                    <th class="text-right">Balance</th>
                                    <th class="text-right">Price</th>
                                    <th class="text-right">Value</th>
                                    <th class="text-right">24h Change</th>
                                    <th class="text-right p-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-t border-gray-800">
                                    <td class="p-6">
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
                                    <td class="text-right">2.5634 BTC</td>
                                    <td class="text-right">$45,234.12</td>
                                    <td class="text-right">$115,936.56</td>
                                    <td class="text-right text-green-500">+2.5%</td><td class="p-6">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 rounded-lg bg-blue-500 hover:bg-blue-600 text-sm">Trade</button>
                                            <button class="px-3 py-1 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">Send</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-t border-gray-800">
                                    <td class="p-6">
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
                                    <td class="text-right">12.8934 ETH</td>
                                    <td class="text-right">$2,456.78</td>
                                    <td class="text-right">$31,655.89</td>
                                    <td class="text-right text-green-500">+3.2%</td>
                                    <td class="p-6">
                                        <div class="flex space-x-2">
                                            <button class="px-3 py-1 rounded-lg bg-blue-500 hover:bg-blue-600 text-sm">Trade</button>
                                            <button class="px-3 py-1 rounded-lg bg-gray-800 hover:bg-gray-700 text-sm">Send</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

    <script>
        // Initialize price chart
        const ctx = document.getElementById('priceChart').getContext('2d');
        const priceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: Array.from({length: 24}, (_, i) => `${i}:00`),
                datasets: [{
                    label: 'BTC/USD',
                    data: Array.from({length: 24}, () => Math.random() * 2000 + 44000),
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            maxTicksLimit: 8
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(107, 114, 128, 0.1)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            callback: value => `$${value.toLocaleString()}`
                        }
                    }
                }
            }
        });
    </script>
        <?php

$content = ob_get_clean();


include_once 'layout.php';


?>