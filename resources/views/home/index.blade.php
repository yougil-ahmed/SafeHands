<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLAY NFT - Premium NFT Marketplace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --primary: #6d28d9;
            --primary-dark: #5b21b6;
            --dark: #0f172a;
            --darker: #020617;
            --light: #f8fafc;
            --gray: #94a3b8;
        }
        
        body {
            background: linear-gradient(to bottom, var(--darker), var(--dark));
            color: var(--light);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #8b5cf6, #6366f1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.9));
            backdrop-filter: blur(10px);
        }
        
        .nft-card {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nft-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
            border-color: rgba(109, 40, 217, 0.5);
        }
        
        .nft-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(109, 40, 217, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }
        
        .nft-card:hover::before {
            opacity: 1;
        }
        
        .nft-info {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 0 0 16px 16px;
        }
        
        .seller-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 12px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .seller-card:hover {
            background: rgba(51, 65, 85, 0.5);
            transform: translateY(-5px);
            border-color: var(--primary);
        }
        
        .feature-card {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            border-color: var(--primary);
        }
        
        .blur-bg {
            backdrop-filter: blur(10px);
            background: rgba(2, 6, 23, 0.7);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(109, 40, 217, 0.3);
        }
        
        .btn-outline {
            border: 1px solid var(--primary);
            color: var(--primary);
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        .countdown-badge {
            background: rgba(220, 38, 38, 0.2);
            color: #f87171;
        }
        
        .like-badge {
            background: rgba(220, 38, 38, 0.2);
            color: #f87171;
        }
        
        .nav-link {
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .search-input {
            background: rgba(30, 41, 59, 0.7);
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            background: rgba(30, 41, 59, 0.9);
            box-shadow: 0 0 0 2px var(--primary);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: var(--darker);
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <header class="py-4 px-6 md:px-12 fixed w-full z-50 blur-bg border-b border-gray-800">
        <nav class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                @php
                    $appName = explode(' ', config('app.name', 'Safe Hands'));
                @endphp
                <span class="text-white text-2xl font-bold">{{ $appName[0] }}</span>
                <span class="bg-purple-600 text-white px-2 rounded text-sm font-bold">{{ $appName[1] }}</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)]">Home</a>
                
                <!-- categories Dropdown -->
                <div class="relative group">
                    <button class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)] flex items-center">
                        Categories
                        <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div class="absolute left-0 mt-2 w-[900px] bg-[var(--dark)] rounded-md shadow-lg z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-1 group-hover:translate-y-0 border border-[var(--darker)]">
                        
                        <!-- Title Section -->
                        <div class="px-6 pt-4 pb-2 border-b border-[var(--darker)]">
                            <h3 class="text-lg font-bold text-[var(--primary)]">Browse Categories</h3>
                            <p class="text-sm text-[var(--gray)] mt-1">Discover all available categories</p>
                        </div>
                        
                        <!-- Categories Grid -->
                        <div class="grid grid-cols-3 gap-4 p-4">
                            @foreach ($categories as $category)
                                <a href="{{ route('category.show', $category->id) }}" class="group flex items-center gap-3 p-3 rounded-lg hover:bg-[var(--darker)] transition-colors">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 rounded-lg bg-[var(--darker)] border border-[var(--darker)] flex items-center justify-center">
                                            <img src="{{ asset('storage/' . $category->category_image) }}"
                                                alt="{{ $category->name }}"
                                                class="w-12 h-12 object-cover rounded-lg border border-[var(--darker)]"
                                                width="48"
                                                height="48">
                                        </div>
                                    </div>
                                    <div>
                                        <span class="block text-sm font-semibold text-[var(--light)] group-hover:text-[var(--primary)] transition-colors">
                                            {{ $category->name }}
                                        </span>
                                        <span class="block text-xs text-[var(--gray)] mt-1 truncate max-w-[140px]">{{ $category->description ?? '' }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <!-- View All Footer -->
                        <div class="px-6 py-3 border-t border-[var(--darker)] bg-[var(--dark)] rounded-b-md">
                            <a href="{{ route('categories.index') }}" class="text-sm font-medium text-[var(--primary)] hover:text-[var(--primary-dark)] flex items-center justify-end">
                                View all categories
                                <i class="fas fa-arrow-right ml-1 text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- buyers Dropdown -->
                <div class="relative group">
                    <button class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)] flex items-center">
                        For Buyers <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    
                    <div class="absolute left-0 mt-2 w-[600px] bg-[var(--dark)] rounded-md shadow-lg z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-1 group-hover:translate-y-0 border border-[var(--darker)]">
                        <!-- Title Section -->
                        <div class="px-6 pt-4 pb-2 border-b border-[var(--darker)]">
                            <h3 class="text-lg font-bold text-[var(--primary)]">Buyer Solutions</h3>
                            <p class="text-sm text-[var(--gray)] mt-1">Find the perfect service for your mission</p>
                        </div>
                        
                        <!-- Action Buttons Grid -->
                        <div class="grid grid-cols-2 gap-4 p-6">
                            <!-- Start Your Search Button -->
                            <a href="#" class="group flex flex-col items-center justify-center p-6 rounded-lg border border-[var(--darker)] hover:border-[var(--primary)] hover:bg-[var(--darker)] transition-all">
                                <div class="w-14 h-14 bg-[var(--primary)]/10 rounded-full flex items-center justify-center mb-3 group-hover:bg-[var(--primary)]/20 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[var(--primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-[var(--light)] group-hover:text-[var(--primary)] transition-colors">Start Your Search</h4>
                                <p class="text-sm text-[var(--gray)] text-center mt-1">Find your perfect service match</p>
                            </a>
                            
                            <!-- Sign In Button -->
                            <a href="{{ route('login') }}" class="group flex flex-col items-center justify-center p-6 rounded-lg border border-[var(--darker)] hover:border-[var(--primary)] hover:bg-[var(--darker)] transition-all">
                                <div class="w-14 h-14 bg-[var(--primary)]/10 rounded-full flex items-center justify-center mb-3 group-hover:bg-[var(--primary)]/20 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[var(--primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-[var(--light)] group-hover:text-[var(--primary)] transition-colors">Sign In</h4>
                                <p class="text-sm text-[var(--gray)] text-center mt-1">Access your account</p>
                            </a>
                        </div>
                        
                        <!-- Quick Links -->
                        <div class="px-6 py-4 border-t border-[var(--darker)]">
                            <h4 class="text-sm font-semibold text-[var(--gray)] uppercase mb-2">Quick Links</h4>
                            <div class="grid grid-cols-2 gap-2">
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Pricing
                                </a>
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    How It Works
                                </a>
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Safety Tips
                                </a>
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    FAQs
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- seller Dropdown -->
                <div class="relative group">
                    <button class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)] flex items-center">
                        For Sellers <i class="fas fa-chevron-down ml-1 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>

                    <div class="absolute left-0 mt-2 w-[600px] bg-[var(--dark)] rounded-md shadow-lg z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-1 group-hover:translate-y-0 border border-[var(--darker)]">
                        <!-- Title Section -->
                        <div class="px-6 pt-4 pb-2 border-b border-[var(--darker)]">
                            <h3 class="text-lg font-bold text-[var(--primary)]">Seller Opportunities</h3>
                            <p class="text-sm text-[var(--gray)] mt-1">Build your career with {{ config('app.name', 'Safe Hands') }}</p>
                        </div>

                        <!-- Action Buttons Grid -->
                        <div class="grid grid-cols-2 gap-4 p-6">
                            <!-- Apply Now Button -->
                            <a href="#" class="group flex flex-col items-center justify-center p-6 rounded-lg border border-[var(--darker)] hover:border-[var(--primary)] hover:bg-[var(--darker)] transition-all">
                                <div class="w-14 h-14 bg-[var(--primary)]/10 rounded-full flex items-center justify-center mb-3 group-hover:bg-[var(--primary)]/20 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[var(--primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-[var(--light)] group-hover:text-[var(--primary)] transition-colors">Apply Now</h4>
                                <p class="text-sm text-[var(--gray)] text-center mt-1">Join our network of professional sellers</p>
                            </a>

                            <!-- Seller Login Button -->
                            <a href="{{ route('login') }}" class="group flex flex-col items-center justify-center p-6 rounded-lg border border-[var(--darker)] hover:border-[var(--primary)] hover:bg-[var(--darker)] transition-all">
                                <div class="w-14 h-14 bg-[var(--primary)]/10 rounded-full flex items-center justify-center mb-3 group-hover:bg-[var(--primary)]/20 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[var(--primary)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-[var(--light)] group-hover:text-[var(--primary)] transition-colors">Seller Login</h4>
                                <p class="text-sm text-[var(--gray)] text-center mt-1">Access your nanny portal</p>
                            </a>
                        </div>

                        <!-- Quick Links -->
                        <div class="px-6 py-4 border-t border-[var(--darker)]">
                            <h4 class="text-sm font-semibold text-[var(--gray)] uppercase mb-2">Resources</h4>
                            <div class="grid grid-cols-2 gap-2">
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Training Programs
                                </a>
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Pay Rates
                                </a>
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Certification
                                </a>
                                <a href="#" class="text-sm text-[var(--light)] hover:text-[var(--primary)] flex items-center py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Seller FAQs
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="#" class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)]">About us</a>
                <a href="#" class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)]">Blog</a>
                <a href="#" class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)]">Contact</a>
                
            </div>
            
            <div class="flex items-center space-x-4">
                {{-- <div class="relative">
                    <input type="text" placeholder="Search NFTs..." class="search-input text-white px-4 py-2 rounded-full w-32 md:w-48 focus:outline-none focus:ring-0">
                    <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                </div> --}}
                <a href="{{ route('login') }}" class="nav-link text-[var(--light)] font-medium hover:text-[var(--primary)]">Sign in</a>
                <button class="btn-primary px-4 py-2 rounded-full font-medium flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[var(--light)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span><a href="{{ route('register') }}">Get Started</a></span>
                </button>
                <button class="md:hidden text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="px-6 md:px-12 pt-32 pb-20 flex flex-col md:flex-row items-center justify-between gap-12">
        <div class="md:w-1/2 mb-8 md:mb-0 animate__animated animate__fadeInLeft">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Book Trusted Professionals for 
                <span class="gradient-text">Real-World Services</span>
            </h1>
            <p class="text-gray-400 mb-8 text-lg">
                The premier platform for local services. Hire cleaners, chefs, handymen, tutors, and more—all verified and ready to help.
            </p>
            
            <div class="flex flex-wrap gap-4 mb-8">
                <button class="btn-primary px-6 py-3 rounded-full font-medium flex items-center space-x-2">
                    <i class="fas fa-search"></i>
                    <span>Find Services</span>
                </button>
                <button class="btn-outline px-6 py-3 rounded-full font-medium flex items-center space-x-2">
                    <i class="fas fa-user-plus"></i>
                    <span>Become a Provider</span>
                </button>
                <button class="bg-transparent flex items-center space-x-2 text-gray-400 hover:text-white transition duration-300">
                    <i class="fas fa-play-circle text-purple-400"></i>
                    <span>How It Works</span>
                </button>
            </div>
            
            <div class="grid grid-cols-3 gap-6 mb-8">
                <div class="bg-gray-800 bg-opacity-50 p-4 rounded-xl">
                    <h3 class="text-2xl font-bold text-purple-400">10k +</h3>
                    <p class="text-gray-400">Services Offered</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-4 rounded-xl">
                    <h3 class="text-2xl font-bold text-purple-400">5k +</h3>
                    <p class="text-gray-400">Happy Clients</p>
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-4 rounded-xl">
                    <h3 class="text-2xl font-bold text-purple-400">2k +</h3>
                    <p class="text-gray-400">Verified Pros</p>
                </div>
            </div>
            
            <div class="flex items-center">
                <div class="flex -space-x-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-purple-900 object-cover">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-purple-900 object-cover">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-purple-900 object-cover">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="User" class="w-12 h-12 rounded-full border-2 border-purple-900 object-cover">
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-purple-400">15k +</h3>
                    <p class="text-gray-400">Active Users</p>
                </div>
            </div>
        </div>
        
        <div class="md:w-2/5 relative animate__animated animate__fadeInRight">
            <div class="service-card floating">
                <img src="{{ asset('storage/wallpaperflare.com_wallpaper.jpg') }}" alt="Featured Service" class="w-full h-auto rounded-lg object-cover">
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black to-transparent">
                    <div class="flex justify-between items-end mb-4">
                        <div>
                            <p class="text-sm text-purple-400 mb-1">Available Now</p>
                            <p class="text-xl font-bold">Professional Cleaning</p>
                        </div>
                        <div>
                            <p class="text-sm text-purple-400 mb-1">Starting at</p>
                            <p class="text-xl font-bold">$25/hr <span class="text-gray-400 text-sm">(5.0 ★)</span></p>
                        </div>
                    </div>
                    <div class="flex justify-between gap-3">
                        <button class="btn-outline w-full py-3 rounded-full font-medium flex items-center justify-center space-x-2">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Book Now</span>
                        </button>
                        <button class="btn-primary w-full py-3 rounded-full font-medium flex items-center justify-center space-x-2">
                            <i class="fas fa-info-circle"></i>
                            <span>Details</span>
                        </button>
                    </div>
                </div>
                <div class="absolute top-4 right-4 verified-badge px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-check-circle mr-1"></i> Verified Pro
                </div>
            </div>
            
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-purple-600 rounded-full opacity-20 filter blur-3xl -z-10"></div>
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-600 rounded-full opacity-20 filter blur-3xl -z-10"></div>
        </div>
    </section>
    
    <!-- Payment Partners -->
    <section class="px-6 md:px-12 py-8 border-t border-b border-gray-800 bg-gray-900 bg-opacity-50 overflow-hidden">
        <!-- First ticker - scrolling left -->
        <div class="relative mb-6">
            <div class="flex w-max animate-marquee-left whitespace-nowrap">
                <!-- Original items -->
                <div class="flex items-center gap-12 pr-12">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Web Development</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">UI/UX Design</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Mobile Apps</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Cloud Services</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Cybersecurity</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Data Analytics</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">API Integration</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Performance Optimization</span>
                    </div>
                </div>
                <!-- Duplicate items (creates seamless loop) -->
                <div class="flex items-center gap-12 pr-12">
                    <!-- Same service items repeated -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Web Development</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">UI/UX Design</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Mobile Apps</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Cloud Services</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Cybersecurity</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Data Analytics</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">API Integration</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Performance Optimization</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second ticker - scrolling right (opposite direction) -->
        <div class="relative">
            <div class="flex w-max animate-marquee-right whitespace-nowrap">
                <!-- Original items -->
                <div class="flex items-center gap-12 pr-12">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Market Analysis</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-lime-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Customer Support</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Quality Assurance</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">24/7 Availability</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Growth Strategy</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Verified Solutions</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-fuchsia-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Database Management</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Enterprise Solutions</span>
                    </div>
                </div>
                <!-- Duplicate items (creates seamless loop) -->
                <div class="flex items-center gap-12 pr-12">
                    <!-- Same service items repeated -->
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Market Analysis</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-lime-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Customer Support</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Quality Assurance</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">24/7 Availability</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Growth Strategy</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Verified Solutions</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-fuchsia-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Database Management</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                        </svg>
                        <span class="text-sm text-gray-300 font-medium">Enterprise Solutions</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes marquee-left {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        
        @keyframes marquee-right {
            0% {
                transform: translateX(-50%);
            }
            100% {
                transform: translateX(0);
            }
        }
        
        .animate-marquee-left {
            animation: marquee-left 30s linear infinite;
        }
        
        .animate-marquee-right {
            animation: marquee-right 30s linear infinite;
        }
        
        .animate-marquee-left:hover,
        .animate-marquee-right:hover {
            animation-play-state: paused;
        }
    </style>
    
    <!-- Trending Collections -->
    <section class="px-6 md:px-12 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Trending Collections</h2>
            <a href="#" class="text-purple-400 hover:text-purple-300 flex items-center">
                <span>View all</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Collection 1 -->
            <div class="nft-card group">
                <div class="relative overflow-hidden">
                    <img src="https://source.unsplash.com/random/600x400/?abstract,art" alt="NFT Collection" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-xl font-bold">Abstract Dreams</h3>
                        <p class="text-sm text-gray-400">by Modern people</p>
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-400">Floor price</p>
                            <p class="font-bold">1.2 ETH</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Volume</p>
                            <p class="font-bold">24.5 ETH</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                        </div>
                        <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded">+12 more</span>
                    </div>
                </div>
            </div>
            
            <!-- Collection 2 -->
            <div class="nft-card group">
                <div class="relative overflow-hidden">
                    <img src="https://source.unsplash.com/random/600x400/?digital,art" alt="NFT Collection" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-xl font-bold">Digital Decade</h3>
                        <p class="text-sm text-gray-400">by Anthony gongras</p>
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-400">Floor price</p>
                            <p class="font-bold">3.8 ETH</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Volume</p>
                            <p class="font-bold">124.5 ETH</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                        </div>
                        <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded">+8 more</span>
                    </div>
                </div>
                <div class="absolute top-4 right-4 like-badge px-3 py-1 rounded-full text-sm font-medium flex items-center">
                    <i class="fas fa-heart mr-1"></i> 50k
                </div>
            </div>
            
            <!-- Collection 3 -->
            <div class="nft-card group">
                <div class="relative overflow-hidden">
                    <img src="https://source.unsplash.com/random/600x400/?cyberpunk,art" alt="NFT Collection" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-xl font-bold">Cyber City</h3>
                        <p class="text-sm text-gray-400">by Neon Dreams</p>
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-400">Floor price</p>
                            <p class="font-bold">2.4 ETH</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Volume</p>
                            <p class="font-bold">87.2 ETH</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/55.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/men/66.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                        </div>
                        <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded">+5 more</span>
                    </div>
                </div>
            </div>
            
            <!-- Collection 4 -->
            <div class="nft-card group">
                <div class="relative overflow-hidden">
                    <img src="https://source.unsplash.com/random/600x400/?fantasy,art" alt="NFT Collection" class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                    <div class="absolute bottom-4 left-4">
                        <h3 class="text-xl font-bold">Mythic Realms</h3>
                        <p class="text-sm text-gray-400">by Fantasy Art</p>
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-sm text-gray-400">Floor price</p>
                            <p class="font-bold">1.8 ETH</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-400">Volume</p>
                            <p class="font-bold">64.3 ETH</p>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/men/77.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/women/88.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                            <img src="https://randomuser.me/api/portraits/men/99.jpg" alt="Owner" class="w-6 h-6 rounded-full border border-purple-900">
                        </div>
                        <span class="text-xs bg-gray-800 text-gray-400 px-2 py-1 rounded">+15 more</span>
                    </div>
                </div>
                <div class="absolute top-4 right-4 countdown-badge px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-bolt mr-1"></i> Trending
                </div>
            </div>
        </div>
    </section>
    
    <!-- Top Sellers -->
    <section class="px-6 md:px-12 py-16 bg-gray-900 bg-opacity-50">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Top Creators</h2>
            <a href="#" class="text-purple-400 hover:text-purple-300 flex items-center">
                <span>View all</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
            <!-- Seller 1 -->
            <div class="seller-card flex flex-col items-center p-6 text-center">
                <div class="relative mb-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Seller" class="w-20 h-20 rounded-full border-2 border-purple-600 object-cover">
                    <span class="absolute -bottom-1 -right-1 bg-purple-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">1</span>
                </div>
                <h3 class="font-bold mb-1">Sophie Melton</h3>
                <p class="text-purple-400 font-bold text-sm">230.8 ETH</p>
                <button class="btn-outline mt-3 px-4 py-1 rounded-full text-xs font-medium w-full">
                    Follow
                </button>
            </div>
            
            <!-- Seller 2 -->
            <div class="seller-card flex flex-col items-center p-6 text-center">
                <div class="relative mb-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Seller" class="w-20 h-20 rounded-full border-2 border-purple-600 object-cover">
                    <span class="absolute -bottom-1 -right-1 bg-purple-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">2</span>
                </div>
                <h3 class="font-bold mb-1">Leighton Kramer</h3>
                <p class="text-purple-400 font-bold text-sm">276.7 ETH</p>
                <button class="btn-outline mt-3 px-4 py-1 rounded-full text-xs font-medium w-full">
                    Follow
                </button>
            </div>
            
            <!-- Seller 3 -->
            <div class="seller-card flex flex-col items-center p-6 text-center">
                <div class="relative mb-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Seller" class="w-20 h-20 rounded-full border-2 border-purple-600 object-cover">
                    <span class="absolute -bottom-1 -right-1 bg-purple-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">3</span>
                </div>
                <h3 class="font-bold mb-1">Haylie Arcand</h3>
                <p class="text-purple-400 font-bold text-sm">345.6 ETH</p>
                <button class="btn-outline mt-3 px-4 py-1 rounded-full text-xs font-medium w-full">
                    Follow
                </button>
            </div>
            
            <!-- Seller 4 -->
            <div class="seller-card flex flex-col items-center p-6 text-center">
                <div class="relative mb-4">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Seller" class="w-20 h-20 rounded-full border-2 border-purple-600 object-cover">
                    <span class="absolute -bottom-1 -right-1 bg-gray-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">4</span>
                </div>
                <h3 class="font-bold mb-1">Bowen Higgins</h3>
                <p class="text-purple-400 font-bold text-sm">323.7 ETH</p>
                <button class="btn-outline mt-3 px-4 py-1 rounded-full text-xs font-medium w-full">
                    Follow
                </button>
            </div>
            
            <!-- Seller 5 -->
            <div class="seller-card flex flex-col items-center p-6 text-center">
                <div class="relative mb-4">
                    <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Seller" class="w-20 h-20 rounded-full border-2 border-purple-600 object-cover">
                    <span class="absolute -bottom-1 -right-1 bg-gray-600 text-white text-xs font-bold w-6 h-6 rounded-full flex items-center justify-center">5</span>
                </div>
                <h3 class="font-bold mb-1">Saige Fuentes</h3>
                <p class="text-purple-400 font-bold text-sm">347.7 ETH</p>
                <button class="btn-outline mt-3 px-4 py-1 rounded-full text-xs font-medium w-full">
                    Follow
                </button>
            </div>
        </div>
    </section>
    
    <!-- Hot Bids -->
    <section class="px-6 md:px-12 py-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Hot Bids</h2>
            <div class="flex space-x-2">
                <button class="px-4 py-2 rounded-full bg-gray-800 text-white">Art</button>
                <button class="px-4 py-2 rounded-full bg-transparent text-gray-400 hover:text-white">Photography</button>
                <button class="px-4 py-2 rounded-full bg-transparent text-gray-400 hover:text-white">Games</button>
                <button class="px-4 py-2 rounded-full bg-transparent text-gray-400 hover:text-white">Music</button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- NFT 1 -->
            <div class="nft-card">
                <div class="relative">
                    <img src="https://source.unsplash.com/random/600x400/?abstract,painting" alt="NFT" class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4 like-badge px-3 py-1 rounded-full text-sm font-medium flex items-center cursor-pointer hover:bg-red-500 hover:text-white">
                        <i class="fas fa-heart mr-1"></i> 124
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-lg">Cyber</h3>
                            <p class="text-sm text-gray-400">by @modernart</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Current bid</p>
                            <p class="font-bold">2 ETH</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-clock mr-1"></i> 6h 23m 12s
                        </div>
                        <button class="btn-outline px-4 py-2 rounded-full text-sm">
                            Place Bid
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- NFT 2 -->
            <div class="nft-card">
                <div class="relative">
                    <img src="https://source.unsplash.com/random/600x400/?digital,art" alt="NFT" class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4 like-badge px-3 py-1 rounded-full text-sm font-medium flex items-center cursor-pointer hover:bg-red-500 hover:text-white">
                        <i class="fas fa-heart mr-1"></i> 89
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-lg">Vengeance</h3>
                            <p class="text-sm text-gray-400">by @neonartist</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Current bid</p>
                            <p class="font-bold">1.9 ETH</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-clock mr-1"></i> 4h 12m 45s
                        </div>
                        <button class="btn-outline px-4 py-2 rounded-full text-sm">
                            Place Bid
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- NFT 3 -->
            <div class="nft-card">
                <div class="relative">
                    <img src="https://source.unsplash.com/random/600x400/?cyberpunk,art" alt="NFT" class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4 like-badge px-3 py-1 rounded-full text-sm font-medium flex items-center cursor-pointer hover:bg-red-500 hover:text-white">
                        <i class="fas fa-heart mr-1"></i> 215
                    </div>
                    <div class="absolute top-4 left-4 countdown-badge px-3 py-1 rounded-full text-sm font-medium">
                        <i class="fas fa-bolt mr-1"></i> Hot
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-lg">Digital Decade</h3>
                            <p class="text-sm text-gray-400">by @anthonyg</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Current bid</p>
                            <p class="font-bold">3.81 ETH</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-clock mr-1"></i> 1h 45m 22s
                        </div>
                        <button class="btn-outline px-4 py-2 rounded-full text-sm">
                            Place Bid
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- NFT 4 -->
            <div class="nft-card">
                <div class="relative">
                    <img src="https://source.unsplash.com/random/600x400/?fantasy,art" alt="NFT" class="w-full h-64 object-cover">
                    <div class="absolute top-4 right-4 like-badge px-3 py-1 rounded-full text-sm font-medium flex items-center cursor-pointer hover:bg-red-500 hover:text-white">
                        <i class="fas fa-heart mr-1"></i> 176
                    </div>
                </div>
                <div class="p-4 nft-info">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="font-bold text-lg">Winter Jams</h3>
                            <p class="text-sm text-gray-400">by @snowartist</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">Current bid</p>
                            <p class="font-bold">3 ETH</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-400">
                            <i class="fas fa-clock mr-1"></i> 8h 12m 05s
                        </div>
                        <button class="btn-outline px-4 py-2 rounded-full text-sm">
                            Place Bid
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <button class="btn-outline px-8 py-3 rounded-full font-medium">
                Load More
            </button>
        </div>
    </section>
    
    <!-- How It Works -->
    <section class="px-6 md:px-12 py-16 bg-gray-900 bg-opacity-50">
        <h2 class="text-3xl font-bold text-center mb-4">How It Works</h2>
        <p class="text-gray-400 text-center max-w-2xl mx-auto mb-12">Start creating, selling and collecting NFTs in just a few simple steps</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- Step 1 -->
            <div class="feature-card p-6 text-center">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">1</div>
                <h3 class="text-xl font-bold mb-3">Set Up Your Wallet</h3>
                <p class="text-gray-400">Connect your preferred crypto wallet to get started with buying, selling, and creating NFTs.</p>
            </div>
            
            <!-- Step 2 -->
            <div class="feature-card p-6 text-center">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">2</div>
                <h3 class="text-xl font-bold mb-3">Create Your Collection</h3>
                <p class="text-gray-400">Upload your artwork, add descriptions, and set up your NFT collection with just a few clicks.</p>
            </div>
            
            <!-- Step 3 -->
            <div class="feature-card p-6 text-center">
                <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">3</div>
                <h3 class="text-xl font-bold mb-3">List Them For Sale</h3>
                <p class="text-gray-400">Choose between auctions, fixed-price listings, and declining-price listings to sell your NFTs.</p>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="px-6 md:px-12 py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900/30 to-blue-900/30 -z-10"></div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-purple-600 rounded-full opacity-20 filter blur-3xl -z-10"></div>
        <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-600 rounded-full opacity-20 filter blur-3xl -z-10"></div>
        
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6">Join Us to Create, Sell and Collect NFTs</h2>
            <p class="text-gray-400 mb-8 text-lg max-w-2xl mx-auto">
                Be part of the future of digital art and collectibles. Join our community of artists, collectors, and enthusiasts.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="btn-primary px-8 py-4 rounded-full font-medium text-lg flex items-center space-x-2">
                    <i class="fas fa-wallet"></i>
                    <span>Connect Wallet</span>
                </button>
                <button class="btn-outline px-8 py-4 rounded-full font-medium text-lg flex items-center space-x-2">
                    <i class="fas fa-rocket"></i>
                    <span>Explore Marketplace</span>
                </button>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="px-6 md:px-12 py-12 border-t border-gray-800">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
            <div class="md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <span class="text-white text-2xl font-bold">PLAY</span>
                    <span class="bg-purple-600 text-white px-2 rounded text-sm font-bold">NFT</span>
                </div>
                <p class="text-gray-400 text-sm mb-6">
                    The world's largest marketplace for crypto collectibles and non fungible tokens (NFTs). 
                    Buy, sell, and discover exclusive digital assets.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center">
                        <i class="fab fa-discord"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center">
                        <i class="fab fa-telegram"></i>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">Marketplace</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">All NFTs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Art</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Photography</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Games</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Music</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">My Account</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Profile</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Favorites</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Watchlist</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">My Collections</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Settings</a></li>
                </ul>
            </div>
            
            <div>
                <h3 class="text-lg font-bold mb-4 text-purple-400">Resources</h3>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Help Center</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Platform Status</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Partners</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Blog</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Newsletter</a></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2023 PLAY NFT. All rights reserved.</p>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-white text-sm transition">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition">Terms of Service</a>
                <a href="#" class="text-gray-400 hover:text-white text-sm transition">Cookies</a>
            </div>
        </div>
    </footer>

    <script>
        // Enhanced JavaScript with more functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Countdown timer for featured NFT
            let countdown = {
                hours: 1,
                minutes: 20,
                seconds: 15
            };
            
            // Update countdown timer
            const countdownInterval = setInterval(function() {
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
                            clearInterval(countdownInterval);
                        }
                    }
                }
                
                // Format countdown display
                const timeDisplay = `${countdown.hours}h ${countdown.minutes}m ${countdown.seconds}s`;
                
                // Update displayed time
                const countdownElement = document.getElementById('hero-countdown');
                if (countdownElement) {
                    countdownElement.textContent = timeDisplay;
                    
                    // Add pulse animation when time is running out
                    if (countdown.hours === 0 && countdown.minutes < 5) {
                        countdownElement.classList.add('text-red-400', 'pulse');
                    }
                }
                
            }, 1000);
            
            // Like button functionality
            document.querySelectorAll('.like-badge').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const icon = this.querySelector('i');
                    const countElement = this.querySelector('span') || this;
                    
                    if (icon.classList.contains('text-red-500')) {
                        icon.classList.remove('text-red-500');
                        if (countElement.textContent.includes('k')) {
                            const count = parseFloat(countElement.textContent);
                            countElement.textContent = `${(count - 1).toFixed(1)}k`;
                        } else {
                            countElement.textContent = parseInt(countElement.textContent) - 1;
                        }
                    } else {
                        icon.classList.add('text-red-500');
                        if (countElement.textContent.includes('k')) {
                            const count = parseFloat(countElement.textContent);
                            countElement.textContent = `${(count + 1).toFixed(1)}k`;
                        } else {
                            countElement.textContent = parseInt(countElement.textContent) + 1;
                        }
                    }
                });
            });
            
            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.md\\:hidden.text-white');
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    // You would implement mobile menu toggle functionality here
                    console.log('Mobile menu toggled');
                });
            }
            
            // Connect wallet button
            const connectButtons = document.querySelectorAll('[class*="Connect Wallet"]');
            connectButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Wallet connection logic would go here
                    console.log('Connect wallet clicked');
                    this.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Connected';
                    this.classList.remove('btn-primary');
                    this.classList.add('bg-green-600', 'hover:bg-green-700');
                });
            });
            
            // Place bid buttons
            document.querySelectorAll('[class*="Place Bid"]').forEach(button => {
                button.addEventListener('click', function() {
                    // Bid placement logic would go here
                    console.log('Place bid clicked for NFT');
                    const card = this.closest('.nft-card');
                    if (card) {
                        card.classList.add('ring-2', 'ring-purple-500');
                        setTimeout(() => {
                            card.classList.remove('ring-2', 'ring-purple-500');
                        }, 1000);
                    }
                });
            });
            
            // Follow buttons
            document.querySelectorAll('[class*="Follow"]').forEach(button => {
                button.addEventListener('click', function() {
                    if (this.textContent.trim() === 'Follow') {
                        this.innerHTML = '<i class="fas fa-check mr-2"></i> Following';
                        this.classList.remove('btn-outline');
                        this.classList.add('bg-purple-600', 'text-white');
                    } else {
                        this.innerHTML = 'Follow';
                        this.classList.add('btn-outline');
                        this.classList.remove('bg-purple-600', 'text-white');
                    }
                });
            });
            
            // Search functionality
            const searchInput = document.querySelector('.search-input');
            if (searchInput) {
                searchInput.addEventListener('keyup', function(e) {
                    if (e.key === 'Enter') {
                        console.log('Searching for:', this.value);
                        // Implement search functionality
                    }
                });
            }
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Intersection Observer for animations
            const observerOptions = {
                threshold: 0.1
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.nft-card, .feature-card, .seller-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>