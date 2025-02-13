<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CritoX - Acheter Cryptos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        dark: '#0D1117',
                        'dark-light': '#1A1F25'
                    }
                }
            }
        }
    </script>
    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(26, 31, 37, 0.8);
        }
    </style>
</head>
<body class="bg-dark text-white">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-dark-light h-full flex flex-col fixed left-0 top-0">
            <div class="p-4 border-b border-gray-800">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cube text-sm"></i>
                    </div>
                    <span class="text-xl font-bold">CritoX</span>
                </div>
            </div>
            
            <nav class="flex-1 p-4">
    <ul class="space-y-2">
        <li>
            <a href="dashboard" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="reception" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-download"></i>
                <span>Réception</span>
            </a>
        </li>
        <li>
            <a href="envoi" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-paper-plane"></i>
                <span>Envoi</span>
            </a>
        </li>
        <li>
            <a href="achat" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-shopping-cart"></i>
                <span>Buy</span>
            </a>
        </li>
        <li>
            <a href="vente" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-dollar-sign"></i>
                <span>Sell</span>
            </a>
        </li>
        <li>
            <a href="transaction" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-exchange-alt"></i>
                <span>Transactions</span>
            </a>
        </li>
        <li>
            <a href="watchlist" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-star"></i>
                <span>Watchlist</span>
            </a>
        </li>
    </ul>
</nav>


            <div class="p-4 border-t border-gray-800">
                <button class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-800 text-gray-400 hover:text-white transition-colors w-full">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </div>
        </aside>




        <?php echo $content; ?>



        </div>
</body>
</html>
