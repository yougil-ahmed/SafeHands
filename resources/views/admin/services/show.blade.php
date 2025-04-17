@extends('admin.layouts.layout')
@section('admin_page_title')
    Service {{$service->title}}
@endsection

@section('admin_layout')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

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
                            <div class="w-12 h-12 rounded-full overflow-hidden mr-3 border-2 border-gray-200 shadow-sm">
                                <img src="{{ asset('storage/' . $service->seller->profile_image) }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-800">{{ $service->seller->name }}</h3>
                                <span class="text-sm text-gray-500">Professional Seller</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced Image Slider with Thumbnails -->
                    <div 
                        x-data="{
                            activeSlide: 0,
                            images: [
                                @if($service->service_image)
                                    '{{ asset('storage/' . $service->service_image) }}',
                                @endif
                                @if(!empty($service->images))
                                    @if(is_array($service->images))
                                        @foreach($service->images as $img)
                                            '{{ asset('storage/' . $img) }}',
                                        @endforeach
                                    @elseif(is_string($service->images))
                                        @php
                                            $decodedImages = json_decode($service->images, true);
                                        @endphp
                                        @if(is_array($decodedImages))
                                            @foreach($decodedImages as $img)
                                                '{{ asset('storage/' . $img) }}',
                                            @endforeach
                                        @endif
                                    @endif
                                @endif
                            ],
                            get totalSlides() {
                                return this.images.length;
                            }
                        }"
                        class="mb-8"
                    >
                        <!-- Main Image -->
                        <div class="relative overflow-hidden bg-gray-100 rounded-lg shadow-md" style="height: 400px;">
                            <template x-for="(image, index) in images" :key="index">
                                <div 
                                    x-show="activeSlide === index"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    class="absolute inset-0 flex items-center justify-center"
                                >
                                    <img :src="image" alt="Service Image" class="w-full h-full object-cover">
                                </div>
                            </template>
                            
                            <!-- Navigation Arrows -->
                            <button 
                                @click="activeSlide = (activeSlide - 1 + totalSlides) % totalSlides" 
                                class="absolute left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-white bg-opacity-80 shadow-md flex items-center justify-center hover:bg-opacity-100 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                x-show="totalSlides > 1"
                            >
                                <i class="fas fa-chevron-left text-gray-700"></i>
                            </button>
                            <button 
                                @click="activeSlide = (activeSlide + 1) % totalSlides" 
                                class="absolute right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-white bg-opacity-80 shadow-md flex items-center justify-center hover:bg-opacity-100 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                x-show="totalSlides > 1"
                            >
                                <i class="fas fa-chevron-right text-gray-700"></i>
                            </button>
                            
                            <!-- Slide Counter -->
                            <div class="absolute bottom-4 right-4 bg-black bg-opacity-60 text-white px-3 py-1 rounded-full text-sm" x-show="totalSlides > 1">
                                <span x-text="activeSlide + 1"></span>/<span x-text="totalSlides"></span>
                            </div>
                        </div>
                        
                        <!-- Thumbnails Navigation -->
                        <div class="flex space-x-2 mt-4 overflow-x-auto pb-2" x-show="totalSlides > 1">
                            <template x-for="(image, index) in images" :key="index">
                                <button 
                                    @click="activeSlide = index"
                                    :class="{'ring-2 ring-blue-500': activeSlide === index}"
                                    class="flex-shrink-0 w-20 h-20 rounded-md overflow-hidden border border-gray-200 focus:outline-none transition-all duration-200"
                                >
                                    <img :src="image" alt="Thumbnail" class="w-full h-full object-cover">
                                </button>
                            </template>
                        </div>
                    </div>

                    <!-- Description with better styling -->
                    <div class="mb-8 bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b border-gray-100 pb-3">Description</h2>
                        <div class="prose max-w-none text-gray-700">
                            {{ $service->description }}
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Pricing Package with Enhanced Styling -->
                <div class="w-full lg:w-1/3">
                    <div 
                        x-data="{ activeTab: '{{ $service->packages[0]->name }}' }" 
                        class="border border-gray-200 rounded-lg overflow-hidden shadow-sm bg-white sticky top-4"
                    >
                        <!-- Tabs Navigation with Improved Styling -->
                        <div class="flex border-b border-gray-200">
                            @foreach($service->packages as $index => $package)
                            <button 
                                @click="activeTab = '{{ $package->name }}'"
                                :class="{
                                    'bg-white border-b-2 border-blue-600 font-medium text-blue-600': activeTab === '{{ $package->name }}',
                                    'bg-gray-50 text-gray-600 hover:bg-gray-100 transition-colors': activeTab !== '{{ $package->name }}'
                                }"
                                class="flex-1 py-3 px-4 text-center"
                            >
                                {{ $package->name }}
                            </button>
                            @endforeach
                        </div>
                        
                        <!-- Package Content with Enhanced UI -->
                        <div class="p-6">
                            @foreach($service->packages as $package)
                            <!-- {{ $package->name }} Package -->
                            <div x-show="activeTab === '{{ $package->name }}'">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="font-medium text-lg text-gray-800">{{ $package->name }} Package</h3>
                                    <span class="font-bold text-xl text-blue-600">${{ $package->price }}</span>
                                </div>
                                
                                <p class="text-gray-600 mb-6" style="max-width: 80ch; word-break: break-word;">
                                    {{ $package->description }}
                                </p>
                                
                                <div class="space-y-3 mb-6">
                                    @foreach ($package->optionValues as $option)
                                        <div class="flex items-start bg-gray-50 p-3 rounded-md">
                                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                                            <div>
                                                <span class="font-medium">{{ $option->option->name }}:</span>
                                                <span class="text-gray-700">{{ $option->value }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            
                            <!-- Common Footer with Improved Styling -->
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-md flex items-center justify-center mb-4 transition-colors duration-200 font-medium shadow-sm">
                                <span class="mr-2">Continue</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                            
                            <div class="text-center">
                                <a href="#" class="text-blue-600 hover:text-blue-800 hover:underline text-sm font-medium">Compare packages</a>
                            </div>
                        </div>
                    </div>
                                        
                    <!-- Contact Button with Enhanced Styling -->
                    <div class="mt-4">
                        <button class="w-full border border-gray-300 bg-white hover:bg-gray-50 py-3 px-4 rounded-md flex items-center justify-center transition-colors duration-200 shadow-sm">
                            <i class="far fa-comment-dots mr-2 text-gray-600"></i>
                            <span class="font-medium text-gray-700">Contact me</span>
                            <i class="fas fa-chevron-down ml-2 text-gray-500"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Messaging Section with Improved Styling -->
            <div class="fixed bottom-4 left-4 flex items-center bg-white rounded-full p-2 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300 z-10">
                <div class="w-12 h-12 rounded-full overflow-hidden mr-3 border-2 border-green-100">
                    <img src="{{ asset('storage/' . $service->seller->profile_image) }}" alt="Profile" class="w-full h-full object-cover">
                </div>
                <div class="mr-4">
                    <div class="font-medium">Message {{ $service->seller->name }}</div>
                    <div class="flex items-center text-sm text-gray-500">
                        <span class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-1"></span>
                            Online
                        </span>
                        <span class="mx-2">•</span>
                        <span>Avg. response time: 1 Hour</span>
                    </div>
                </div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-md transition-colors duration-200">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-8">
            <!-- Reviews Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Customer Reviews</h2>
                    <div class="flex items-center mt-1">
                        <div class="flex text-yellow-400 mr-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i > $service->avg_rating ? '-empty' : '' }}"></i>
                            @endfor
                        </div>
                        <span class="text-gray-600 text-sm">
                            {{ $service->reviews_count }} reviews • {{ $service->avg_rating }}/5 average
                        </span>
                    </div>
                </div>
                <a href="{{ route('admin.reviews.create', $service->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Write a Review
                </a>
            </div>

            <!-- Reviews Filter -->
            <div class="flex flex-wrap gap-2 mb-6">
                <button class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">All</button>
                <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm font-medium">5 Stars</button>
                <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm font-medium">4 Stars</button>
                <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm font-medium">3 Stars</button>
                <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm font-medium">2 Stars</button>
                <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full text-sm font-medium">1 Star</button>
            </div>

            <!-- Reviews List -->
            <div class="space-y-6">
                @forelse($service->reviews as $review)
                <div class="border-b border-gray-100 pb-6 last:border-0 last:pb-0">
                    <!-- Review Header -->
                    <div class="flex justify-between items-start mb-3">
                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full overflow-hidden mr-3 flex-shrink-0">
                                <img src="{{ asset('storage/' . $review->user->profile_image) }}" 
                                    alt="{{ $review->user->name }}" 
                                    class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $review->user->name }}</h4>
                                <div class="flex items-center text-sm text-gray-500">
                                    <div class="flex text-yellow-400 mr-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i > $review->rating ? '-empty' : '' }}"></i>
                                        @endfor
                                    </div>
                                    <span>{{ $review->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                    </div>

                    <!-- Review Content -->
                    <p class="text-gray-700 mb-3">{{ $review->content }}</p>

                    <!-- Review Actions -->
                    <div class="flex items-center text-sm text-gray-500">
                        <button class="flex items-center mr-4 hover:text-blue-600">
                            <i class="far fa-thumbs-up mr-1"></i>
                            <span>Helpful ({{ $review->helpful_count }})</span>
                        </button>
                        <button class="flex items-center hover:text-blue-600">
                            <i class="far fa-comment mr-1"></i>
                            <span>Reply</span>
                        </button>
                    </div>

                    <!-- Replies (if any) -->
                    @if($review->replies->count() > 0)
                    <div class="mt-4 pl-4 border-l-2 border-gray-200">
                        @foreach($review->replies as $reply)
                        <div class="mb-3 last:mb-0">
                            <div class="flex items-center text-sm mb-1">
                                <span class="font-medium text-gray-800 mr-2">{{ $reply->user->name }}</span>
                                <span class="text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $reply->content }}</p>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @empty
                <div class="text-center py-8">
                    <i class="fas fa-comment-slash text-3xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500">No reviews yet. Be the first to review!</p>
                </div>
                @endforelse
            </div>

        <!-- Pagination -->
        {{-- @if($service->reviews->hasPages())
            <div class="mt-6 flex justify-center">
                {{ $service->reviews->links() }}
            </div>
            @endif
        </div> --}}
    </div>
@endsection