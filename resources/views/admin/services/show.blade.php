@extends('admin.layouts.layout')
@section('admin_page_title')
    Service {{$service->title}}
@endsection

@section('admin_layout')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <div class="main-content-wrap">

        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Services</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="text-tiny">Dashboard</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.services.index') }}">
                        <div class="text-tiny">Services</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ $service->title }}</div>
                </li>
            </ul>
        </div>

        <div class="container mx-auto py-8 px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Left Column - Service Details -->
                <div class="w-full lg:w-2/3">
                    <!-- Title and Profile -->
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $service->title }}</h1>
                        
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-3">
                                <img src="/api/placeholder/100/100" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800">{{ $service->seller->name }}</h3>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service Image Carousel -->
                    <div class="relative mb-8 bg-black rounded-lg overflow-hidden">
                        <img src="/api/placeholder/800/450" alt="Service Banner" class="w-full h-auto">
                        
                        <!-- Carousel Navigation -->
                        <button class="absolute left-2 top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center">
                            <i class="fas fa-chevron-left text-gray-700"></i>
                        </button>
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center">
                            <i class="fas fa-chevron-right text-gray-700"></i>
                        </button>
                        
                        <!-- Carousel Thumbnails -->
                        <div class="flex justify-center gap-2 mt-4">
                            <div class="w-16 h-16 bg-gray-200 rounded"></div>
                            <div class="w-16 h-16 bg-gray-300 rounded"></div>
                            <div class="w-16 h-16 bg-gray-400 rounded"></div>
                        </div>
                    </div>

                    <br><br>
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $service->description }}</h1>
                    </div>
                </div>
                
                <!-- Right Column - Pricing Package -->
                <div class="w-full lg:w-1/3">
                    <div 
                        x-data="{ activeTab: '{{ $service->packages[0]->name }}' }" 
                        class="border border-gray-200 rounded-lg overflow-hidden"
                    >
                        <!-- Tabs Navigation -->
                        <div class="flex border-b border-gray-200">
                            <button 
                                @click="activeTab = '{{ $service->packages[0]->name }}'"
                                :class="{
                                    'bg-white border-b-2 border-black font-medium': activeTab === '{{ $service->packages[0]->name }}',
                                    'bg-gray-50 text-gray-500': activeTab !== '{{ $service->packages[0]->name }}'
                                }"
                                class="flex-1 py-3 px-4"
                            >
                                {{ $service->packages[0]->name }}
                            </button>
                            <button 
                                @click="activeTab = '{{ $service->packages[1]->name }}'"
                                :class="{
                                    'bg-white border-b-2 border-black font-medium': activeTab === '{{ $service->packages[1]->name }}',
                                    'bg-gray-50 text-gray-500': activeTab !== '{{ $service->packages[1]->name }}'
                                }"
                                class="flex-1 py-3 px-4"
                            >
                                {{ $service->packages[1]->name }}
                            </button>
                            <button 
                                @click="activeTab = '{{ $service->packages[2]->name }}'"
                                :class="{
                                    'bg-white border-b-2 border-black font-medium': activeTab === '{{ $service->packages[2]->name }}',
                                    'bg-gray-50 text-gray-500': activeTab !== '{{ $service->packages[2]->name }}'
                                }"
                                class="flex-1 py-3 px-4"
                            >
                                {{ $service->packages[2]->name }}
                            </button>
                        </div>
                        
                        <!-- Package Content -->
                        <div class="p-6">
                            <!-- {{ $service->packages[0]->name }} Package -->
                            <div x-show="activeTab === '{{ $service->packages[0]->name }}'">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-medium text-lg">{{ $service->packages[0]->name }} Package</h3>
                                    <span class="font-bold text-xl">{{ $service->packages[0]->price }} DH</span>
                                </div>
                                
                                <p class="text-gray-600 mb-4" style="max-width: 80ch; word-break: break-word;">
                                    {{ $service->packages[0]->description }}
                                </p>
                                
                                <div class="flex items-center mb-4">
                                    <i class="far fa-clock text-gray-400 mr-2"></i>
                                    <span>2-day delivery</span>
                                    <div class="mx-3 text-gray-300">|</div>
                                    <i class="fas fa-sync text-gray-400 mr-2"></i>
                                    <span>2 Revisions</span>
                                </div>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>1 page</span>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>Design customization</span>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-gray-300 mt-1 mr-3"></i>
                                        <span class="text-gray-400">Content upload</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- {{ $service->packages[1]->name }} Package -->
                            <div x-show="activeTab === '{{ $service->packages[1]->name }}'">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-medium text-lg">{{ $service->packages[1]->name }} Package</h3>
                                    <span class="font-bold text-xl">{{ $service->packages[1]->price }} DH</span>
                                </div>
                                
                                <p class="text-gray-600 mb-4" style="max-width: 80ch; word-break: break-word;">
                                    {{ $service->packages[1]->description }}
                                </p>
                                
                                <div class="flex items-center mb-4">
                                    <i class="far fa-clock text-gray-400 mr-2"></i>
                                    <span>5-day delivery</span>
                                    <div class="mx-3 text-gray-300">|</div>
                                    <i class="fas fa-sync text-gray-400 mr-2"></i>
                                    <span>5 Revisions</span>
                                </div>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>5 pages</span>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>Responsive design</span>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>CMS integration</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- {{ $service->packages[2]->name }} Package -->
                            <div x-show="activeTab === '{{ $service->packages[2]->name }}'">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-medium text-lg">{{ $service->packages[2]->name }} Package</h3>
                                    <span class="font-bold text-xl">{{ $service->packages[2]->price }} DH</span>
                                </div>
                                
                                <p class="text-gray-600 mb-4" style="max-width: 80ch; word-break: break-word;">
                                    {{ $service->packages[2]->description }}
                                </p>
                                
                                <div class="flex items-center mb-4">
                                    <i class="far fa-clock text-gray-400 mr-2"></i>
                                    <span>10-day delivery</span>
                                    <div class="mx-3 text-gray-300">|</div>
                                    <i class="fas fa-sync text-gray-400 mr-2"></i>
                                    <span>Unlimited Revisions</span>
                                </div>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>E-commerce functionality</span>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>Payment gateway</span>
                                    </div>
                                    <div class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                        <span>{{ $service->packages[2]->name }} support</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Common Footer -->
                            <button class="w-full bg-black text-white py-3 px-4 rounded-md flex items-center justify-center mb-4">
                                <span class="mr-2">Continue</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            
                            <div class="text-center">
                                <a href="#" class="text-gray-600 hover:underline">Compare packages</a>
                            </div>
                        </div>
                    </div>

                    <!-- Include Alpine.js -->
                    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
                                        
                    <!-- Contact Button -->
                    <div class="mt-4">
                        <button class="w-full border border-gray-300 py-3 px-4 rounded-md flex items-center justify-center">
                            <span>Contact me</span>
                            <i class="fas fa-chevron-down ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Messaging Section -->
            <div class="fixed bottom-4 left-4 flex items-center bg-white rounded-full p-2 shadow-lg border border-gray-200">
                <div class="w-12 h-12 rounded-full overflow-hidden mr-3">
                    <img src="/api/placeholder/100/100" alt="Profile" class="w-full h-full object-cover">
                </div>
                <div class="mr-2">
                    <div class="font-medium">Message Ahmed Y</div>
                    <div class="flex items-center text-sm text-gray-500">
                        <span class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                            Online
                        </span>
                        <span class="mx-2">•</span>
                        <span>Avg. response time: 1 Hour</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection