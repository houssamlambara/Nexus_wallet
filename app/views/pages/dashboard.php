
<?php
extract($data);

$titre = 'Dashboard';
ob_start();
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>


    <!-- Dashboard Content -->
    <div class="p-6">
        <!-- Portfolio Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-dark-light p-6 rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-400">Total Balance</h3>
                    <i class="fas fa-wallet text-blue-500"></i>
                </div>
                <div class="text-2xl font-bold"><?php
                    $userBalance = $userBalance ?? 1000; // Default to 0 if undefined or null
                    echo number_format((float) $userBalance, 2) . " USD";
                    ?> USD</div>
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
                        <div class="flex space-x-2">
                            <button data-timeframe="1H" class="px-3 py-1 rounded-lg bg-blue-500 text-blue-500 text-sm">1H</button>

                        </div>
                    </div>
                </div>
                <div style="height: 400px;">
                    <canvas id="priceChart"></canvas>
                </div>

            </div>

            <!-- Recent Orders -->
            <div class="bg-dark-light p-6 rounded-xl">
                <h3 class="font-bold mb-6">Top 3 Cryptocurrencies by Market Cap</h3>
                <div class="space-y-4" id="crypto-list">
                    <!-- Crypto data will be dynamically inserted here -->
                </div>
            </div>
        </div>

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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($crypto) && is_array($crypto)) {
                    foreach ($crypto as $asset) {
                        $cryptoName = $asset['crypto_name'];
                        $symbol = $asset['symbol'];
                        $balance = $asset['balance'];
                        ?>
                        <tr class="border-t border-gray-800" data-symbol="<?= strtolower($symbol) ?>">
                            <td class="p-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-yellow-500/20 rounded-full flex items-center justify-center">
                                        <i class="fab fa-bitcoin text-yellow-500"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium"><?= $cryptoName ?></div>
                                        <div class="text-gray-400 text-sm"><?= strtoupper($symbol) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right crypto-balance"><?= number_format($balance, 4) ?> <?= strtoupper($symbol) ?></td>
                            <td class="text-right crypto-price" id="price-<?= strtolower($symbol) ?>">Loading...</td>
                            <td class="text-right crypto-value" id="value-<?= strtolower($symbol) ?>">Loading...</td>
                            <td class="text-right crypto-change" id="change-<?= strtolower($symbol) ?>">Loading...</td>
                        </tr>
                    <?php }} else {
    echo "No crypto data available";
} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    // Fetch data for top cryptocurrencies
    const url = "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=3&page=1";

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const cryptoList = document.getElementById('crypto-list');
            cryptoList.innerHTML = ''; // Clear existing content

            data.forEach(crypto => {
                const cryptoItem = document.createElement('div');
                cryptoItem.className = 'flex items-center justify-between p-3 bg-dark rounded-lg';

                const cryptoIconAndName = document.createElement('div');
                cryptoIconAndName.className = 'flex items-center space-x-3';

                const cryptoIcon = document.createElement('div');
                cryptoIcon.className = 'w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center';
                cryptoIcon.innerHTML = `<img src="${crypto.image}" alt="${crypto.name}" class="w-4 h-4">`;

                const cryptoNameAndSymbol = document.createElement('div');
                cryptoNameAndSymbol.innerHTML = `
                <div class="font-medium">${crypto.name}</div>
                <div class="text-gray-400 text-sm">${crypto.symbol.toUpperCase()}</div>
            `;

                cryptoIconAndName.appendChild(cryptoIcon);
                cryptoIconAndName.appendChild(cryptoNameAndSymbol);

                const cryptoPriceAndChange = document.createElement('div');
                cryptoPriceAndChange.className = 'text-right';
                const priceChangeClass = crypto.price_change_percentage_24h >= 0 ? 'text-green-500' : 'text-red-500';
                cryptoPriceAndChange.innerHTML = `
                <div class="font-medium">$${crypto.current_price.toLocaleString()}</div>
                <div class="${priceChangeClass} text-sm">${crypto.price_change_percentage_24h.toFixed(2)}%</div>
            `;

                cryptoItem.appendChild(cryptoIconAndName);
                cryptoItem.appendChild(cryptoPriceAndChange);

                cryptoList.appendChild(cryptoItem);
            });
        })
        .catch(error => console.error('Error fetching data:', error));

    // Initialize Chart.js with proper configuration
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Chart.js with proper configuration
        const ctx = document.getElementById('priceChart').getContext('2d');
        const priceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'BTC/USD',
                    data: [],
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
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                        callbacks: {
                            label: function(context) {
                                return `$${context.parsed.y.toLocaleString()}`;
                            }
                        }
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
                            maxTicksLimit: 8,
                            font: {
                                size: 11
                            }
                        }
                    },
                    y: {
                        grid: {
                            color: 'rgba(107, 114, 128, 0.1)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6B7280',
                            font: {
                                size: 11
                            },
                            callback: value => `$${value.toLocaleString()}`
                        }
                    }
                }
            }
        });

        // Function to format the timestamp
        const formatTime = (timestamp) => {
            const date = new Date(timestamp * 1000); // Convert Unix timestamp to milliseconds
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${hours}:${minutes}`;
        };

        // Function to fetch and update chart data
        const fetchCryptoPriceData = async () => {
            try {
                const response = await fetch(
                    "https://min-api.cryptocompare.com/data/v2/histohour?fsym=BTC&tsym=USD&limit=24&aggregate=1&e=CCCAGG"
                );

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();

                if (data && data.Data && data.Data.Data && data.Data.Data.length > 0) {
                    // Extract and format timestamps and prices
                    const labels = data.Data.Data.map(priceData => formatTime(priceData.time));
                    const prices = data.Data.Data.map(priceData => priceData.close);

                    // Update chart with new data
                    priceChart.data.labels = labels;
                    priceChart.data.datasets[0].data = prices;
                    priceChart.update('none'); // Use 'none' for smoother updates
                } else {
                    console.error('Invalid data format received from API');
                }

            } catch (error) {
                console.error("Error fetching BTC price data:", error);
            }
        };

        // Initialize chart data
        fetchCryptoPriceData();

        // Update chart data every 5 minutes
        setInterval(fetchCryptoPriceData, 5 * 60 * 1000);
    });




    // Function to update crypto prices and calculations
    function number_format(number, decimals) {
        return number.toLocaleString('en-US', {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals
        });
    }

    // Function to update crypto prices and calculations
    async function updateCryptoPrices() {
        const rows = document.querySelectorAll('tbody tr');

        try {
            // First get a list of all cryptocurrency IDs we need to fetch
            const coins = Array.from(rows).map(row => {
                const symbol = row.dataset.symbol;
                return {
                    element: row,
                    id: symbol.toLowerCase()
                };
            });

            // Make the API call using symbols directly
            const response = await fetch(
                `https://api.coingecko.com/api/v3/simple/price?ids=${coins.map(c => c.id).join(',')}&vs_currencies=usd&include_24h_change=true`
            );

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            console.log("API Response:", data); // Debug log

            // Update each row with the fetched data
            coins.forEach(({element, id}) => {
                const cryptoData = data[id];
                console.log(`Processing ${id}:`, cryptoData); // Debug log

                if (cryptoData) {
                    const price = cryptoData.usd;
                    const change = cryptoData.usd_24h_change;
                    // Get balance without the currency symbol
                    const balanceText = element.querySelector('.crypto-balance').textContent;
                    const balance = parseFloat(balanceText.split(' ')[0].replace(',', ''));
                    const value = price * balance;

                    // Update the elements
                    element.querySelector('.crypto-price').textContent = `$${number_format(price, 2)}`;
                    element.querySelector('.crypto-value').textContent = `$${number_format(value, 2)}`;
                    element.querySelector('.crypto-change').textContent = `${change?.toFixed(2) || '0.00'}%`;
                    element.querySelector('.crypto-change').className =
                        `text-right crypto-change ${(change || 0) >= 0 ? 'text-green-500' : 'text-red-500'}`;
                } else {
                    console.error(`No data found for ${id}`);
                    // Set specific error message for debugging
                    element.querySelector('.crypto-price').textContent = `No data for ${id}`;
                    element.querySelector('.crypto-value').textContent = 'N/A';
                    element.querySelector('.crypto-change').textContent = 'N/A';
                }
            });
        } catch (error) {
            console.error('Error fetching crypto prices:', error);
            // Show the specific error message
            rows.forEach(row => {
                row.querySelector('.crypto-price').textContent = `API Error: ${error.message}`;
                row.querySelector('.crypto-value').textContent = 'Error';
                row.querySelector('.crypto-change').textContent = 'Error';
            });
        }
    }

    // Make sure to call the function when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, fetching crypto prices...'); // Debug log
        updateCryptoPrices();
        setInterval(updateCryptoPrices, 60000); // Update every minute
    });

</script>

<?php
$content = ob_get_clean();


include_once 'layout.php';


?>