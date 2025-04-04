<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f0f0; /* Fallback color */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        body::before {
            content: '';
            position: fixed;
            top: -10px; /* Extra space to prevent edge artifacts */
            left: -10px;
            right: -10px;
            bottom: -10px;
            background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(10px) brightness(0.8);
            z-index: -1;
        }
        .card-container {
            background-color: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .left-panel {
            background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            position: relative;
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(0);
        }
        .left-panel.slide-left {
            transform: translateX(-100%);
        }
        .left-panel.slide-right {
            transform: translateX(100%);
        }
        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.6));
            border-radius: 20px;
        }
        .profile-container {
            position: absolute;
            bottom: 20px;
            left: 20px;
            display: flex;
            align-items: center;
            color: white;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .nav-buttons {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
        .nav-button {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 8px;
            cursor: pointer;
        }
        .login-btn {
            background-color: #3b82f6;
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            background-color: #2563eb;
        }
        .input-field {
            border: none;
            border-bottom: 1px solid #e5e5e5;
            padding: 10px 0;
            width: 100%;
            outline: none;
            transition: border-color 0.3s;
        }
        .input-field:focus {
            border-color: #3b82f6;
        }
        .switch-buttons {
            display: flex;
            gap: 8px;
        }
        .switch-btn {
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .switch-btn.active {
            background-color: #3b82f6;
            color: white;
        }
        .switch-btn.inactive {
            background-color: transparent;
            border: 1px solid #e5e5e5;
            color: #333;
        }
        .switch-btn.inactive:hover {
            background-color: #f5f5f5;
        }
        .form-container {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        .form-container.hidden {
            opacity: 0;
            transform: translateY(10px);
            pointer-events: none;
            position: absolute;
        }
        .form-container.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .service-feature {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }
        .service-feature svg {
            color: #3b82f6;
            margin-right: 8px;
            flex-shrink: 0;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="card-container w-full max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 h-[600px] overflow-hidden">
        <!-- Left Panel (Image) - Will animate between positions -->
        <div class="left-panel relative hidden md:block" id="image-panel">
            <div class="dark-overlay"></div>
            <!-- Top Navigation -->
            <div class="absolute top-6 left-6 right-6 flex justify-between items-center">
                <div class="text-white font-bold">Our Services</div>
                <div class="flex space-x-2">
                    <button class="px-4 py-1 text-sm bg-transparent border border-white text-white rounded-full" id="switch-to-signup">Sign Up</button>
                    <button class="px-4 py-1 text-sm bg-white text-blue-600 rounded-full">Learn More</button>
                </div>
            </div>
            
            <!-- Service Features -->
            <div class="absolute top-1/2 left-10 right-10 transform -translate-y-1/2 text-white">
                <h3 class="text-xl font-bold mb-4">Why Choose Us?</h3>
                <div class="service-feature">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Premium service quality</span>
                </div>
                <div class="service-feature">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>24/7 customer support</span>
                </div>
                <div class="service-feature">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Secure and reliable</span>
                </div>
                <div class="service-feature">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>Custom solutions</span>
                </div>
            </div>
            
            <!-- Navigation Controls -->
            {{-- <div class="nav-buttons flex">
                <div class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </div>
                <div class="nav-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </div>
            </div> --}}
        </div>
        
        <!-- Right Panel (Forms) -->
        <div class="bg-white p-10 flex flex-col h-full relative">
            <!-- Top Navbar -->
            <div class="flex justify-between items-center mb-16">
                <div class="text-xl font-bold">
                    <h2 class="text-xl md:text-2xl font-black tracking-wider uppercase font-sans logo1">
                        @php
                            $brandName = config('app.name', 'ServicePro');
                            $brandNameParts = explode('_', $brandName);
                            $firstLetter = substr($brandNameParts[0], 0, 1);
                            $remainingFirstPart = substr($brandNameParts[0], 1);
                        @endphp

                        <!-- First part: First letter + remaining part together -->
                        <span class="transition-colors duration-300">
                            <span class="text-[#141E30]">{{ $firstLetter }}</span><label class="text-[#3b82f6] transition-colors duration-300">{{ $remainingFirstPart }}</label>
                        </span>

                        <!-- Second part after "_" (if exists) -->
                        @if(isset($brandNameParts[1]))
                            <label class="text-[#3b82f6] transition-colors duration-300">
                                {{ $brandNameParts[1] }}
                            </label>
                        @endif
                    </h2>
                </div>
                <div class="switch-buttons">
                    <button class="switch-btn active" id="login-btn">Login</button>
                    <button class="switch-btn inactive" id="signup-btn">Sign Up</button>
                </div>
            </div>
            
            <!-- Login Form Content -->
            <div id="login-form" class="form-container visible flex-grow flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-1">Welcome Back</h1>
                <p class="text-gray-600 mb-8">Sign in to access your account and manage services</p>
                
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <input type="email" id="email" name="email" placeholder="Email"
                            class="input-field @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="input-field @error('password') border-red-500 @enderror" required>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">{{ __('Remember me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">{{ __('Forgot password?') }}</a>
                        @endif
                    </div>
                    
                    {{-- <div class="border border-gray-300 rounded-lg p-2 flex justify-center items-center space-x-2 cursor-pointer hover:bg-gray-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span class="text-sm text-gray-600">Continue with Google</span>
                    </div> --}}
                    
                    <button type="submit" class="login-btn text-white rounded-lg py-3 px-4 w-full text-center font-medium">
                        Sign In
                    </button>
                </form>
                
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        New to our platform? 
                        <button type="button" class="text-blue-600 font-medium hover:underline" id="switch-to-signup-text">Create an account</button>
                    </p>
                </div>
            </div>
            
            <!-- Register Form Content -->
            <div id="signup-form" class="form-container hidden flex-grow flex flex-col justify-center">
                <h1 class="text-3xl font-bold mb-1">Get Started</h1>
                <p class="text-gray-600 mb-2">Create your account to access our services</p>
                
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    <div>
                        <input type="text" id="name" name="name" placeholder="Full Name" 
                            class="input-field @error('name') border-red-500 @enderror" 
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <input type="email" id="register-email" name="email" placeholder="Email Address" 
                            class="input-field @error('email') border-red-500 @enderror" 
                            value="{{ old('email') }}" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <input type="password" id="register-password" name="password" placeholder="Password" 
                            class="input-field @error('password') border-red-500 @enderror" required>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                            placeholder="Confirm Password" class="input-field" required>
                    </div>
                    
                    {{-- <div class="flex items-center">
                        <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>
                        </label>
                    </div> --}}
                    
                    {{-- <div class="border border-gray-300 rounded-lg p-2 flex justify-center items-center space-x-2 cursor-pointer hover:bg-gray-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                        <span class="text-sm text-gray-600">Continue with Google</span>
                    </div> --}}
                    
                    <button type="submit" class="login-btn text-white rounded-lg py-3 px-4 w-full text-center font-medium">
                        Create Account
                    </button>
                </form>
                
                <div class="text-center mt-6">
                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <button type="button" class="text-blue-600 font-medium hover:underline" id="switch-to-login-text">Sign in</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginBtn = document.getElementById('login-btn');
            const signupBtn = document.getElementById('signup-btn');
            const switchToSignupText = document.getElementById('switch-to-signup-text');
            const switchToLoginText = document.getElementById('switch-to-login-text');
            const switchToSignup = document.getElementById('switch-to-signup');
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');
            const imagePanel = document.getElementById('image-panel');

            // Function to switch to login form
            function showLoginForm() {
                // Animate image panel to the right
                imagePanel.classList.remove('slide-left');
                imagePanel.classList.add('slide-right');
                
                // After a short delay (to sync with image animation), toggle forms
                setTimeout(() => {
                    loginForm.classList.remove('hidden');
                    loginForm.classList.add('visible');
                    signupForm.classList.remove('visible');
                    signupForm.classList.add('hidden');
                    
                    // Update button states
                    loginBtn.classList.remove('inactive');
                    loginBtn.classList.add('active');
                    signupBtn.classList.remove('active');
                    signupBtn.classList.add('inactive');
                    
                    // Reset image panel position
                    setTimeout(() => {
                        imagePanel.classList.remove('slide-right');
                    }, 600);
                }, 150);
            }

            // Function to switch to signup form
            function showSignupForm() {
                // Animate image panel to the left
                imagePanel.classList.remove('slide-right');
                imagePanel.classList.add('slide-left');
                
                // After a short delay (to sync with image animation), toggle forms
                setTimeout(() => {
                    loginForm.classList.remove('visible');
                    loginForm.classList.add('hidden');
                    signupForm.classList.remove('hidden');
                    signupForm.classList.add('visible');
                    
                    // Update button states
                    loginBtn.classList.remove('active');
                    loginBtn.classList.add('inactive');
                    signupBtn.classList.remove('inactive');
                    signupBtn.classList.add('active');
                    
                    // Reset image panel position
                    setTimeout(() => {
                        imagePanel.classList.remove('slide-left');
                    }, 600);
                }, 150);
            }

            // Event listeners
            loginBtn.addEventListener('click', showLoginForm);
            signupBtn.addEventListener('click', showSignupForm);
            switchToSignupText.addEventListener('click', showSignupForm);
            switchToLoginText.addEventListener('click', showLoginForm);
            switchToSignup.addEventListener('click', showSignupForm);
        });
    </script>
</body>
</html>