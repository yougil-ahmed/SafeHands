<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAY NFT - Discover, Collect and Sell Digital Art</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(to bottom, #0a0a2e, #1a1a4a);
            color: white;
            font-family: 'Arial', sans-serif;
        }
        
        .hero-gradient {
            background: linear-gradient(90deg, #1a1a4a 0%, #291a5e 100%);
        }
        
        .feature-card {
            background: rgba(59, 46, 88, 0.5);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        
        .cta-gradient {
            background: linear-gradient(90deg, #3b1c8f 0%, #1a5e91 100%);
        }
        
        .nft-card {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .nft-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        
        .nft-info {
            background: rgba(30, 30, 60, 0.8);
            border-radius: 0 0 12px 12px;
        }
        
        .seller-card {
            background: rgba(41, 41, 77, 0.5);
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .seller-card:hover {
            background: rgba(61, 61, 107, 0.5);
        }
    </style>
</head>
<body class="min-h-screen">
    <header class="py-4 px-6 md:px-12">
        <nav class="flex justify-between items-center">
            <div class="flex items-center space-x-1">
                <span class="text-white text-2xl font-bold">PLAY</span>
                <span class="bg-purple-600 text-white px-2 rounded text-sm font-bold">NFT</span>
            </div>
            
            <div class="hidden md:flex items-center space-x-6">
                <a href="#" class="text-white font-medium">Home</a>
                <a href="#" class="text-white font-medium">Explore</a>
                <a href="#" class="text-white font-medium">Marketplace</a>
                <a href="#" class="text-white font-medium">Artists</a>
                <a href="#" class="text-white font-medium">News</a>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" placeholder="Search" class="bg-gray-900 bg-opacity-70 text-white px-4 py-2 rounded-full w-32 md:w-48 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div>
                <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-full transition duration-300">Register</button>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="px-6 md:px-12 py-12 flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Discover, Collect and Sell Dope Art and NFTs</h1>
                <p class="text-gray-300 mb-6">The world's largest digital marketplace for crypto collections and non fungible tokens (NFTs).</p>
                
                <div class="flex space-x-4 mb-8">
                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-full transition duration-300">Discover</button>
                    <button class="bg-transparent border border-gray-400 hover:border-white text-white px-6 py-3 rounded-full transition duration-300">Create</button>
                    <button class="bg-transparent flex items-center space-x-2 text-gray-300 hover:text-white transition duration-300">
                        <i class="fas fa-play-circle"></i>
                        <span>Watch video</span>
                    </button>
                </div>
                
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div>
                        <h3 class="text-2xl font-bold text-purple-500">271k +</h3>
                        <p class="text-gray-300">Art works</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-purple-500">20k +</h3>
                        <p class="text-gray-300">Auctions</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-purple-500">7k +</h3>
                        <p class="text-gray-300">Artists</p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <div class="flex -space-x-4">
                        <img src="/api/placeholder/40/40" alt="User" class="w-10 h-10 rounded-full border-2 border-purple-900">
                        <img src="/api/placeholder/40/40" alt="User" class="w-10 h-10 rounded-full border-2 border-purple-900">
                        <img src="/api/placeholder/40/40" alt="User" class="w-10 h-10 rounded-full border-2 border-purple-900">
                        <img src="/api/placeholder/40/40" alt="User" class="w-10 h-10 rounded-full border-2 border-purple-900">
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-purple-500">40k +</h3>
                        <p class="text-gray-300">Active Users</p>
                    </div>
                </div>
            </div>
            
            <div class="md:w-2/5">
                <div class="relative nft-card">
                    <img src="/api/placeholder/400/400" alt="Featured NFT" class="w-full rounded-lg">
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                        <div class="flex justify-between items-end">
                            <div>
                                <p class="text-sm text-purple-400">Ending in</p>
                                <p class="text-lg font-bold">1h 20m 15s</p>
                            </div>
                            <div>
                                <p class="text-sm text-purple-400">Highest bid</p>
                                <p class="text-lg font-bold">$24.11 ETH</p>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <button class="bg-transparent border border-purple-500 text-white px-4 py-2 rounded-full hover:bg-purple-500 transition duration-300">Place a Bid</button>
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-full hover:bg-purple-700 transition duration-300">Purchase</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Payment Partners -->
        <section class="px-6 md:px-12 py-6 border-t border-b border-gray-800">
            <div class="flex flex-wrap justify-between items-center">
                <img src="/api/placeholder/100/30" alt="PayPal" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
                <img src="/api/placeholder/100/30" alt="Coinbase" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
                <img src="/api/placeholder/100/30" alt="Binance" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
                <img src="/api/placeholder/100/30" alt="Revolut" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
                <img src="/api/placeholder/100/30" alt="Exodus" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
                <img src="/api/placeholder/100/30" alt="Bitfinex" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
                <img src="/api/placeholder/100/30" alt="Blockchain" class="h-6 mb-4 md:mb-0 opacity-70 hover:opacity-100 transition">
            </div>
        </section>
        
        <!-- Popular This Week -->
        <section class="px-6 md:px-12 py-12">
            <h2 class="text-3xl font-bold mb-8">Popular this week</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- NFT Card 1 -->
                <div class="nft-card">
                    <img src="/api/placeholder/220/250" alt="NFT" class="w-full h-48 object-cover">
                    <div class="p-3 nft-info">
                        <h3 class="font-bold">Cyber</h3>
                        <p class="text-sm text-gray-400">2 ETH</p>
                    </div>
                </div>
                
                <!-- NFT Card 2 -->
                <div class="nft-card">
                    <img src="/api/placeholder/220/250" alt="NFT" class="w-full h-48 object-cover">
                    <div class="p-3 nft-info">
                        <h3 class="font-bold">Vengeance</h3>
                        <p class="text-sm text-gray-400">1.9 ETH</p>
                    </div>
                </div>
                
                <!-- NFT Card 3 - Featured -->
                <div class="nft-card lg:col-span-1 lg:row-span-2 lg:h-auto">
                    <img src="/api/placeholder/220/450" alt="NFT" class="w-full h-64 lg:h-full object-cover">
                    <div class="p-3 nft-info">
                        <h3 class="font-bold">Digital Decade</h3>
                        <p class="text-sm text-gray-400">by Anthony gongras</p>
                        <div class="flex justify-between items-center mt-2">
                            <p class="font-bold text-purple-400">3.81 ETH</p>
                            <span class="bg-purple-600 text-white text-xs px-2 py-1 rounded">50k</span>
                        </div>
                    </div>
                </div>
                
                <!-- NFT Card 4 -->
                <div class="nft-card">
                    <img src="/api/placeholder/220/250" alt="NFT" class="w-full h-48 object-cover">
                    <div class="p-3 nft-info">
                        <h3 class="font-bold">Winter Jams</h3>
                        <p class="text-sm text-gray-400">3 ETH</p>
                    </div>
                </div>
                
                <!-- NFT Card 5 -->
                <div class="nft-card">
                    <img src="/api/placeholder/220/250" alt="NFT" class="w-full h-48 object-cover">
                    <div class="p-3 nft-info">
                        <h3 class="font-bold">Pastel Valley</h3>
                        <p class="text-sm text-gray-400">4 ETH</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Top Sellers -->
        <section class="px-6 md:px-12 py-12">
            <h2 class="text-3xl font-bold mb-8">Top Sellers</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Seller 1 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Leighton Kramer</h3>
                        <p class="text-purple-400 font-bold">276.7 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 2 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Haylie Arcand</h3>
                        <p class="text-purple-400 font-bold">345.6 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 3 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Bowen Higgins</h3>
                        <p class="text-purple-400 font-bold">323.7 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 4 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Saige Fuentes</h3>
                        <p class="text-purple-400 font-bold">347.7 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 5 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Sophie Melton</h3>
                        <p class="text-purple-400 font-bold">230.8 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 6 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Jeremy Burch</h3>
                        <p class="text-purple-400 font-bold">215.7 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 7 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Amelia Griffith</h3>
                        <p class="text-purple-400 font-bold">324.1 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 8 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Isabella Hart</h3>
                        <p class="text-purple-400 font-bold">258.1 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 9 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Diego Bentley</h3>
                        <p class="text-purple-400 font-bold">276.3 ETH</p>
                    </div>
                </div>
                
                <!-- Seller 10 -->
                <div class="seller-card flex items-center p-4 space-x-3">
                    <img src="/api/placeholder/50/50" alt="Seller" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium">Daisy Arnold</h3>
                        <p class="text-purple-400 font-bold">288.4 ETH</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Explore Artworks -->
        <section class="px-6 md:px-12 py-12">
            <h2 class="text-3xl font-bold mb-8">Explore Artworks</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Category 1 -->
                <div class="feature-card">
                    <div class="p-4">
                        <img src="/api/placeholder/400/200" alt="Abstract" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">Abstract</h3>
                            <span class="text-sm text-gray-400">96 items</span>
                        </div>
                    </div>
                </div>
                
                <!-- Category 2 -->
                <div class="feature-card">
                    <div class="p-4">
                        <img src="/api/placeholder/400/200" alt="3D Art" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">3D Art</h3>
                            <span class="text-sm text-gray-400">45 items</span>
                        </div>
                    </div>
                </div>
                
                <!-- Category 3 -->
                <div class="feature-card">
                    <div class="p-4">
                        <img src="/api/placeholder/400/200" alt="Modern Art" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">Modern Art</h3>
                            <span class="text-sm text-gray-400">92 items</span>
                        </div>
                    </div>
                </div>
                
                <!-- Category 4 -->
                <div class="feature-card">
                    <div class="p-4">
                        <img src="/api/placeholder/400/200" alt="Game" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">Game</h3>
                            <span class="text-sm text-gray-400">75 items</span>
                        </div>
                    </div>
                </div>
                
                <!-- Category 5 -->
                <div class="feature-card">
                    <div class="p-4">
                        <img src="/api/placeholder/400/200" alt="Graffiti" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">Graffiti</h3>
                            <span class="text-sm text-gray-400">26 items</span>
                        </div>
                    </div>
                </div>
                
                <!-- Category 6 -->
                <div class="feature-card">
                    <div class="p-4">
                        <img src="/api/placeholder/400/200" alt="Watercolor" class="w-full h-48 object-cover rounded-lg mb-4">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">Watercolor</h3>
                            <span class="text-sm text-gray-400">62 items</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section class="px-6 md:px-12 py-16">
            <div class="cta-gradient rounded-lg p-8 text-center">
                <h2 class="text-3xl font-bold mb-4">Join Us to Create Sell and Collect NFTs Digital Art</h2>
                <button class="bg-white text-purple-900 hover:bg-gray-200 px-6 py-3 rounded-full font-medium transition duration-300 mt-4">Join Community</button>
            </div>
        </section>
    </main>
    
    <footer class="px-6 md:px-12 py-12 border-t border-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
            <div class="md:col-span-1">
                <div class="flex items-center space-x-1 mb-4">
                    <span class="text-white text-2xl font-bold">PLAY</span>
                    <span class="bg-purple-600 text-white px-2 rounded text-sm font-bold">NFT</span>
                </div>
                <p class="text-gray-400 text-sm mb-6">The world's largest marketplace for crypto collections and non fungible tokens (NFTs) buy, sell and discover exclusive digital assets.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-discord"></i></a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">Explore</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white">Art</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Photography</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Music</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Games</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">My Account</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white">My Profile</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">My Collections</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">My Favorites</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">My Account Settings</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">Resources</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Partners</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Suggestions</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Newsletter</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">Company</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Ranking</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Activity</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Simulate loading popular NFTs
            const popularNfts = [
                { name: 'Cyber', price: '2 ETH', image: '/api/placeholder/220/250' },
                { name: 'Vengeance', price: '1.9 ETH', image: '/api/placeholder/220/250' },
                { name: 'Digital Decade', price: '3.81 ETH', artist: 'Anthony gongras', featured: true, likes: '50k', image: '/api/placeholder/220/450' },
                { name: 'Winter Jams', price: '3 ETH', image: '/api/placeholder/220/250' },
                { name: 'Pastel Valley', price: '4 ETH', image: '/api/placeholder/220/250' }
            ];
            
            // Countdown timer for featured NFT
            let countdown = {
                hours: 1,
                minutes: 20,
                seconds: 15
            };
            
            // Update countdown timer
            setInterval(function() {
                countdown.seconds--;
                
                if (countdown.seconds < 0) {
                    countdown.seconds = 59;
                    countdown.minutes--;
                    
                    if (countdown.minutes < 0) {
                        countdown.minutes = 59;
                        countdown.hours--;
                        
                        if (countdown.hours < 0) {
                            countdown.hours = 0;
                            countdown.minutes = 0;
                            countdown.seconds = 0;
                        }
                    }
                }
                
                // Format countdown display
                const timeDisplay = `${countdown.hours}h ${countdown.minutes}m ${countdown.seconds}s`;
                
                // Update displayed time
                const countdownElements = document.querySelectorAll('.hero-countdown');
                countdownElements.forEach(el => {
                    if (el) el.textContent = timeDisplay;
                });
                
            }, 1000);
            
            // Add hover effects for cards
            const cards = document.querySelectorAll('.nft-card, .feature-card, .seller-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('shadow-lg');
                });
                
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('shadow-lg');
                });
            });
        });
    </script>
</body>
</html>