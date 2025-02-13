<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crypto Price Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }

        .watchlist-add-button {
            background-color: #6366f1;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .watchlist-add-button:hover {
            background-color: #4f46e5;
        }

        .watchlist-add-button.in-watchlist {
            background-color: #9333ea;
        }

        body {
            background-color: #0f172a;
            /* Dark background */
            color: #f8fafc;
            /* Light text */
        }

        .gradient-text {
            background: linear-gradient(45deg, #3b82f6, #60a5fa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .watchlist-button {
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 5px;
            transition: color 0.2s;
        }

        .watchlist-button:hover {
            color: #ffd700;
        }

        .watchlist-button.active {
            color: #ffd700;
        }

        .view-watchlist {
            display: inline-block;
            margin-bottom: 20px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
        }

        .view-watchlist:hover {
            text-decoration: underline;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }

        .crypto-card {
            background-color: #1e293b;
            /* Dark card */
            border-radius: 12px;
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .crypto-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .crypto-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .crypto-name {
            font-size: 1.25rem;
            font-weight: 600;
            color: #f8fafc;
            /* White text */
        }

        .crypto-symbol {
            color: #94a3b8;
            /* Light gray */
            font-size: 0.875rem;
            text-transform: uppercase;
        }

        .crypto-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #f8fafc;
            /* White text */
        }

        .positive-change {
            color: #10b981;
            /* Green for positive change */
        }

        .negative-change {
            color: #ef4444;
            /* Red for negative change */
        }

        .buy-button {
            background-color: #3b82f6;
            /* Blue */
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .buy-button:hover {
            background-color: #2563eb;
            /* Darker blue */
        }

        .sell-button {
            background-color: #ef4444;
            /* Red */
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.2s;
        }

        .sell-button:hover {
            background-color: #dc2626;
            /* Darker red */
        }

        .balance-card {
            background-color: #1e293b;
            /* Dark card */
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 20px;
        }

        .balance-card h3 {
            font-size: 1.25rem;
            color: #94a3b8;
            /* Light gray */
            margin-bottom: 10px;
        }

        .balance-card p {
            font-size: 2rem;
            font-weight: bold;
            color: #f8fafc;
            /* White text */
        }

        .sidebar {
            width: 250px;
            background-color: #1e293b;
            /* Dark sidebar */
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            color: #94a3b8;
            /* Light gray text */
            text-decoration: none;
            padding: 10px;
            border-radius: 8px;
            margin: 5px 0;
            transition: background-color 0.2s, color 0.2s;
        }

        .sidebar a:hover {
            background-color: #334155;
            /* Darker gray on hover */
            color: #f8fafc;
            /* White text on hover */
        }

        .sidebar .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f8fafc;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-dark/80 backdrop-blur-lg border-b border-gray-800 px-12">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cube text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold">CritoX</span>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="#" class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Buy</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Sell</span>
                    </a>
                    <a href="#" class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                        <i class="fas fa-chart-line"></i>
                        <span>Markets</span>
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Wallet</span>
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Connect Wallet</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold gradient-text">Crypto Price Tracker</h1>
            <a href="#" class="view-watchlist" onclick="viewWatchlist()">
                <i class="fas fa-star mr-2"></i>View Watchlist
            </a>
        </div>

        <!-- Balance Card -->
        <div class="balance-card">
            <h3>Your Balance</h3>
            <p>$12,345.67</p>
        </div>

        <!-- Crypto Grid -->
        <div class="crypto-grid grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="cryptoGrid"></div>
    </div>

    <script>
        function createCryptoCard(crypto) {
            const changeClass = crypto.price_change_percentage_24h >= 0 ? "positive-change" : "negative-change";
            const changeIcon = crypto.price_change_percentage_24h >= 0 ? "fa-arrow-up" : "fa-arrow-down";

            return `
                <div class="crypto-card">
                    <div class="crypto-header">
                        <img src="${crypto.image}" alt="${crypto.name}" class="crypto-image" onerror="this.src='/api/placeholder/32/32'">
                        <div class="crypto-title">
                            <div class="crypto-name">${crypto.name}</div>
                            <div class="crypto-symbol">${crypto.symbol}</div>
                        </div>
                    </div>

                    <div class="crypto-price">$${formatNumber(crypto.current_price)}</div>

                    <div class="crypto-change ${changeClass}">
                        <i class="fas ${changeIcon}"></i>
                        ${crypto.price_change_percentage_24h.toFixed(2)}%
                    </div>

                    <div class="crypto-details">
                        <div class="detail-row">
                            <span class="detail-label">Market Cap</span>
                            <span class="detail-value">$${formatNumber(crypto.market_cap)}</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">24h Volume</span>
                            <span class="detail-value">$${formatNumber(crypto.total_volume)}</span>
                        </div>
                    </div>

                    <div class="last-updated">
                        Last updated: ${formatDate(crypto.last_updated)}
                    </div>

                    <div class="crypto-actions">
                        <button class="buy-button" onclick="handleBuy('${crypto.name}')">Buy</button>
                        <button class="sell-button" onclick="handleSell('${crypto.name}')">Sell</button>
                        <button class="favorite-button" onclick="addToFavorites('${crypto.id}', '${crypto.name}', '${crypto.symbol}', ${crypto.current_price})">
                            <i class="fas fa-heart"></i> 
                        </button>
                    </div>
                </div>
            `;
        }

        // Function to add a crypto to favorites
        async function addToFavorites(id, name, symbol, price) {
            try {
                const response = await fetch('add_to_favorites.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        id: id,
                        name: name,
                        symbol: symbol,
                        price: price,
                    }),
                });

                const result = await response.json();
                if (result.success) {
                    alert(`${name} added to favorites!`);
                } else {
                    alert(`Failed to add ${name} to favorites.`);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while adding to favorites.');
            }
        }


        // Add these new functions at the end of your script section
        function toggleWatchlist(cryptoId) {
            const index = watchlist.indexOf(cryptoId);
            if (index === -1) {
                watchlist.push(cryptoId);
            } else {
                watchlist.splice(index, 1);
            }
            localStorage.setItem('cryptoWatchlist', JSON.stringify(watchlist));
            fetchCryptoData(); // Refresh the display
        }

        function viewWatchlist() {
            if (watchlist.length === 0) {
                alert('Your watchlist is empty!');
                return;
            }
            // In a real application, you would redirect to a watchlist page
            alert('Watchlist: ' + watchlist.join(', '));
        }

        function formatNumber(num) {
            return new Intl.NumberFormat("en-US").format(num);
        }

        function formatDate(dateString) {
            return new Date(dateString).toLocaleString();
        }

        function createCryptoCard(crypto) {
            const changeClass = crypto.price_change_percentage_24h >= 0 ? "positive-change" : "negative-change";
            const changeIcon = crypto.price_change_percentage_24h >= 0 ? "fa-arrow-up" : "fa-arrow-down";

            return `
        <div class="crypto-card">
            <div class="crypto-header">
                <img src="${crypto.image}" alt="${crypto.name}" class="crypto-image" onerror="this.src='/api/placeholder/32/32'">
                <div class="crypto-title">
                    <div class="crypto-name">${crypto.name}</div>
                    <div class="crypto-symbol">${crypto.symbol}</div>
                </div>
            </div>

            <div class="crypto-price">$${formatNumber(crypto.current_price)}</div>

            <div class="crypto-change ${changeClass}">
                <i class="fas ${changeIcon}"></i>
                ${crypto.price_change_percentage_24h.toFixed(2)}%
            </div>

            <div class="crypto-details">
                <div class="detail-row">
                    <span class="detail-label">Market Cap</span>
                    <span class="detail-value">$${formatNumber(crypto.market_cap)}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">24h Volume</span>
                    <span class="detail-value">$${formatNumber(crypto.total_volume)}</span>
                </div>
            </div>

            <div class="last-updated">
                Last updated: ${formatDate(crypto.last_updated)}
            </div>

            <div class="crypto-actions">
                <button class="buy-button" onclick="handleBuy('${crypto.name}')">Buy</button>
                <button class="star-button" onclick="addToFavorites('${crypto.id}', '${crypto.name}', '${crypto.symbol}', ${crypto.current_price})">
                    <i class="fas fa-star"></i> 
                </button>
            </div>
        </div>
    `;
        }

        function handleBuy(cryptoName) {
            alert(`You clicked Buy for ${cryptoName}`);
        }

        function handleSell(cryptoName) {
            alert(`You clicked Sell for ${cryptoName}`);
        }

        async function fetchCryptoData() {
            try {
                const response = await fetch(
                    "https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=11&page=1"
                );
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                const data = await response.json();

                if (!Array.isArray(data)) {
                    throw new Error("Invalid data format");
                }

                const cryptoGrid = document.getElementById("cryptoGrid");
                cryptoGrid.innerHTML = data
                    .map((crypto) => createCryptoCard(crypto))
                    .join("");
            } catch (error) {
                console.error("Error fetching crypto data:", error);
            }
        }

        // Initial load
        fetchCryptoData();

        // Refresh every 5 minutes
        setInterval(fetchCryptoData, 300000);
    </script>
</body>

</html>