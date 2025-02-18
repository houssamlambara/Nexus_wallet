


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus - Advanced Crypto Platform</title>
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
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(45deg, #3B82F6, #60A5FA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .crypto-card {
            transition: transform 0.3s ease;
        }

        .crypto-card:hover {
            transform: translateY(-5px);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body class="bg-dark text-white">
    <!-- Floating Elements -->
    <div class="fixed w-full h-full pointer-events-none">
        <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-32 h-32 bg-purple-500/20 rounded-full blur-3xl"></div>
    </div>

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-dark/80 backdrop-blur-lg border-b border-gray-800  px-12">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cube text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold">CritoX</span>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="<?php echo  URLROOT . 'achat' ?>" class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Buy</span>
                    </a>
                    <a href="<?php echo  URLROOT . 'vente' ?>" class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Sell</span>
                    </a>

                    <a href="<?php echo 'marcket/marcket1'; ?>" class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                        <i class="fas fa-chart-line"></i>
                        <span>Markets</span>
                    </a>
                </div>
                <?php if(!isset($_SESSION['user_id'])){ ?>
                <div class="flex items-center space-x-4">
                    <a href='http://localhost/Nexus_wallet/homeController/login' class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg transition-colors flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Login</span>
                    </a>
                    <a href='http://localhost/Nexus_wallet/homeController/register' class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Register</span>
                    </a>
                </div>
                <?php } else {?>
                    <div class="flex items-center space-x-4">
                    <a  class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 ">

                        <span><?php echo $_SESSION['user_name']; ?></span>
                    </a>
                    <a href='http://localhost/Nexus_wallet/homeController/logout' class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition-colors flex items-center space-x-2">
                        <i class="fas fa-wallet"></i>
                        <span>Logout</span>
                    </a>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden px-12 min-h-[90vh] flex items-center">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-bold mb-6">
                        Find the Next
                        <span class="gradient-text">Crypto Gem</span>
                        on CritoX
                    </h1>
                    <p class="text-gray-400 text-lg mb-8">
                        Join CritoX - the most trusted platform with advanced security and lightning-fast execution. Start your crypto journey today!
                    </p>
                    <div class="flex space-x-4">
                        <a href="<?php echo  URLROOT . 'walletController/home' ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-lg transition-colors flex items-center space-x-2">
                            <i class="fas fa-rocket"></i>
                            <span>Get Started</span>
                        </a>
                        <button class="border border-gray-600 hover:bg-gray-800 px-8 py-3 rounded-lg transition-colors flex items-center space-x-2">
                            <i class="fas fa-play"></i>
                            <span>Watch Demo</span>
                        </button>
                    </div>

                    <!-- Trust Badges -->
                    <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shield-alt text-blue-500 text-2xl"></i>
                            <span class="text-sm text-gray-400">Bank-grade Security</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-bolt text-yellow-500 text-2xl"></i>
                            <span class="text-sm text-gray-400">Instant Trading</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-globe text-green-500 text-2xl"></i>
                            <span class="text-sm text-gray-400">Global Coverage</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-headset text-purple-500 text-2xl"></i>
                            <span class="text-sm text-gray-400">24/7 Support</span>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 relative">
                    <div class="relative z-10 animate-float">
                        <img src=img/brcImg.webp" alt="Trading Platform" class="rounded-2xl shadow-2xl">
                        <!-- Floating Elements -->
                        <div class="absolute -top-6 -left-6 w-20 h-20 bg-blue-500/20 rounded-full animate-pulse"></div>
                        <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-purple-500/20 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-dark-light">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center crypto-card p-6 rounded-xl bg-dark">
                    <div class="text-4xl font-bold mb-2 gradient-text">200+</div>
                    <div class="text-gray-400">Countries Covered</div>
                </div>
                <div class="text-center crypto-card p-6 rounded-xl bg-dark">
                    <div class="text-4xl font-bold mb-2 gradient-text">30M+</div>
                    <div class="text-gray-400">Global Investors</div>
                </div>
                <div class="text-center crypto-card p-6 rounded-xl bg-dark">
                    <div class="text-4xl font-bold mb-2 gradient-text">700+</div>
                    <div class="text-gray-400">Listed Coins</div>
                </div>
                <div class="text-center crypto-card p-6 rounded-xl bg-dark">
                    <div class="text-4xl font-bold mb-2 gradient-text">$1.36B</div>
                    <div class="text-gray-400">24h Volume</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Why Choose <span class="gradient-text">CritoX</span>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Experience the next generation of crypto trading with our cutting-edge features and unmatched security.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature Cards -->
                <div class="crypto-card bg-dark-light p-8 rounded-xl">
                    <div class="w-14 h-14 bg-blue-500/20 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-gift text-blue-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Earn up to 15% APY</h3>
                    <p class="text-gray-400">Maximize your crypto holdings with our competitive reward rates.</p>
                </div>

                <div class="crypto-card bg-dark-light p-8 rounded-xl">
                    <div class="w-14 h-14 bg-purple-500/20 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-robot text-purple-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Smart Trading Tools</h3>
                    <p class="text-gray-400">Advanced algorithms and tools to optimize your trading strategy.</p>
                </div>

                <div class="crypto-card bg-dark-light p-8 rounded-xl">
                    <div class="w-14 h-14 bg-green-500/20 rounded-lg flex items-center justify-center mb-6">
                        <i class="fas fa-chart-bar text-green-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Real-time Analytics</h3>
                    <p class="text-gray-400">Track market movements and make informed decisions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Coins Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 my-8">
        <?php if (isset($data['data'])): ?>
            <?php foreach ($data['data'] as $coin): ?>
                <div class="bg-dark-light rounded-xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-800 relative">
                    <!-- Add Star Button with Hidden Form -->
                    <form action="watchlist/add" method="POST" class="absolute top-4 right-4">
                        <input type="hidden" name="coin_id" value="<?php echo htmlspecialchars($coin['id']); ?>">
                        <input type="hidden" name="coin_name" value="<?php echo htmlspecialchars($coin['name']); ?>">
                        <input type="hidden" name="coin_symbol" value="<?php echo htmlspecialchars($coin['symbol'] ?? ''); ?>">
                        <input type="hidden" name="coin_price" value="<?php echo htmlspecialchars($coin['current_price'] ?? ''); ?>">
                        <?php if (isset($coin['image'])): ?>
                            <input type="hidden" name="coin_image" value="<?php echo htmlspecialchars($coin['image']); ?>">
                        <?php endif; ?>
                        <button type="submit" class="text-gray-400 hover:text-yellow-500 transition-colors duration-300 focus:outline-none group">
                            <i class="fas fa-star text-xl group-hover:scale-110 transform transition-transform"></i>
                            <span class="sr-only">Add <?php echo htmlspecialchars($coin['name']); ?> to watchlist</span>
                        </button>
                    </form>

                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <?php if (isset($coin['image']) && $coin['image']): ?>
                                <img src="<?php echo htmlspecialchars($coin['image']); ?>"
                                    alt="<?php echo htmlspecialchars($coin['name']); ?>"
                                    class="w-10 h-10 rounded-full">
                            <?php else: ?>
                                <div class="w-10 h-10 bg-blue-500/20 rounded-full flex items-center justify-center">
                                    <i class="fas fa-coins text-blue-500"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h3 class="font-bold text-white">
                                    <?php echo htmlspecialchars($coin['name']); ?>
                                </h3>
                                <span class="text-sm text-gray-400 uppercase">
                                    <?php echo htmlspecialchars($coin['symbol'] ?? ''); ?>
                                </span>
                            </div>
                        </div>
                        <?php if (isset($coin['price_change_percentage_24h'])): ?>
                            <span class="<?php echo $coin['price_change_percentage_24h'] >= 0 ? 'text-green-500' : 'text-red-500'; ?> font-medium">
                                <?php echo number_format($coin['price_change_percentage_24h'], 2); ?>%
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-lg font-bold text-white">
                            <?php
                            $price = $coin['current_price'] ?? null;
                            echo ($price !== null)
                                ? '$' . number_format($price, 2)
                                : 'Price not available';
                            ?>
                        </div>
                        <?php if (isset($coin['market_cap'])): ?>
                            <div class="text-sm text-gray-400">
                                MCap: $<?php echo number_format($coin['market_cap'] / 1000000, 1); ?>M
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($coin['total_volume'])): ?>
                        <div class="mt-4 pt-4 border-t border-gray-800">
                            <div class="text-sm text-gray-400">
                                24h Volume: $<?php echo number_format($coin['total_volume']); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-span-full bg-dark-light rounded-xl p-6 text-center">
                <div class="text-gray-400">
                    <i class="fas fa-exclamation-circle text-2xl mb-2"></i>
                    <p>Error fetching cryptocurrency data.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Mobile App Section -->
    <section class="py-20 px-12">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">
                        Trade Anywhere with Our
                        <span class="gradient-text">Mobile App</span>
                    </h2>
                    <p class="text-gray-400 mb-8">
                        Download our mobile app to trade on the go. Available for iOS and Android devices.
                    </p>
                    <div class="flex space-x-4">
                        <button class="flex items-center space-x-2 bg-dark-light hover:bg-gray-800 px-6 py-3 rounded-xl transition-colors">
                            <i class="fab fa-apple text-2xl"></i>
                            <div class="text-left">
                                <div class="text-xs">Download on the</div>
                                <div class="text-sm font-bold">App Store</div>
                            </div>
                        </button>
                        <button class="flex items-center space-x-2 bg-dark-light hover:bg-gray-800 px-6 py-3 rounded-xl transition-colors">
                            <i class="fab fa-google-play text-2xl"></i>
                            <div class="text-left">
                                <div class="text-xs">Get it on</div>
                                <div class="text-sm font-bold">Google Play</div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <img src="/api/placeholder/400/800" alt="Mobile App" class="rounded-3xl shadow-2xl mx-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-dark-light px-12">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    What Our Users Say
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Join thousands of satisfied users who trust CritoX for their crypto trading needs.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial Cards -->
                <div class="crypto-card bg-dark p-8 rounded-xl">
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                        <div>
                            <h4 class="font-bold">Alex Thompson</h4>
                            <span class="text-gray-400 text-sm">Crypto Trader</span>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">
                        "The best crypto trading platform I've used. Clean interface and excellent customer support."
                    </p>
                    <div class="flex text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="crypto-card bg-dark p-8 rounded-xl">
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                        <div>
                            <h4 class="font-bold">Sarah Chen</h4>
                            <span class="text-gray-400 text-sm">Investment Analyst</span>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">
                        "Outstanding security features and the earning rewards program is fantastic!"
                    </p>
                    <div class="flex text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="crypto-card bg-dark p-8 rounded-xl">
                    <div class="flex items-center space-x-4 mb-6">
                        <img src="/api/placeholder/48/48" alt="User" class="w-12 h-12 rounded-full">
                        <div>
                            <h4 class="font-bold">Michael Roberts</h4>
                            <span class="text-gray-400 text-sm">Long-term Investor</span>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">
                        "The analytical tools have helped me make better trading decisions. Highly recommended!"
                    </p>
                    <div class="flex text-yellow-500">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="bg-gradient-to-r from-blue-600 to-blue-400 rounded-2xl p-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">
                    Start Your Crypto Journey Today
                </h2>
                <p class="text-lg mb-8 max-w-2xl mx-auto">
                    Join millions of users worldwide and start trading cryptocurrencies with confidence.
                </p>
                <button class="bg-white text-blue-600 px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                    Create Free Account
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark-light pt-20 pb-10 px-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <div>
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cube text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">CritoX</span>
                    </div>
                    <p class="text-gray-400 mb-6">
                        The most trusted cryptocurrency trading platform.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Buy Crypto</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Sell Crypto</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Trading</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Earn</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Support</h4>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Security</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-6">Newsletter</h4>
                    <p class="text-gray-400 mb-4">
                        Subscribe to get the latest news and updates.
                    </p>
                    <div class="flex space-x-2">
                        <input type="email" placeholder="Your email" class="bg-dark px-4 py-2 rounded-lg flex-1 text-white border border-gray-700 focus:outline-none focus:border-blue-500">
                        <button class="bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">
                        © 2025 CritoX. All rights reserved.
                    </p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Add scroll animation for navbar
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 0) {
                nav.classList.add('shadow-lg');
            } else {
                nav.classList.remove('shadow-lg');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.querySelector('#mobile-menu-btn');
        const mobileMenu = document.querySelector('#mobile-menu');

        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>