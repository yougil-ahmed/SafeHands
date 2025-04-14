<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card-container {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        .left-panel {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }
        .left-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd' opacity='0.2'%3E%3Cg fill='%23ffffff' fill-opacity='0.4'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            transform: rotate(15deg);
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }
        .input-field {
            background-color: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .input-field:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }
        .toggle-btn {
            position: relative;
            display: inline-flex;
            background-color: #e2e8f0;
            border-radius: 9999px;
            padding: 2px;
        }
        .toggle-option {
            position: relative;
            z-index: 2;
            cursor: pointer;
            padding: 6px 16px;
            border-radius: 9999px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .toggle-slider {
            position: absolute;
            top: 2px;
            left: 2px;
            height: calc(100% - 4px);
            border-radius: 9999px;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .toggle-slider.login {
            transform: translateX(0);
            width: 80px;
        }
        .toggle-slider.signup {
            transform: translateX(80px);
            width: 85px;
        }
        .active-option {
            color: #6366f1;
        }
        .submit-btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        .social-btn {
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        .social-btn:hover {
            border-color: #c7d2fe;
            background-color: #f8fafc;
        }
        .form-container {
            transition: opacity 0.4s ease, transform 0.4s ease;
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
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="card-container w-full max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Panel (Features) -->
        <div class="left-panel hidden lg:block p-10">
            <div class="relative z-10 h-full flex flex-col">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold">@php echo config('app.name', 'ServicePro'); @endphp</h2>
                </div>
                
                <div class="flex-grow flex flex-col justify-center">
                    <h1 class="text-3xl font-bold mb-6">Welcome to our platform</h1>
                    <p class="text-white/90 mb-8 text-lg">Join thousands of satisfied customers who trust our services every day.</p>
                    
                    <div class="grid grid-cols-1 gap-4 mb-10">
                        <div class="feature-card p-5">
                            <div class="flex items-center">
                                <div class="bg-white/10 p-2 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Premium Quality</h3>
                                    <p class="text-sm text-white/80">Industry-leading service standards</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="feature-card p-5">
                            <div class="flex items-center">
                                <div class="bg-white/10 p-2 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Secure & Private</h3>
                                    <p class="text-sm text-white/80">Your data is always protected</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="feature-card p-5">
                            <div class="flex items-center">
                                <div class="bg-white/10 p-2 rounded-lg mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Cloud Powered</h3>
                                    <p class="text-sm text-white/80">Access from anywhere, anytime</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-sm text-white/80">
                    © @php echo date('Y'); @endphp @php echo config('app.name', 'ServicePro'); @endphp. All rights reserved.
                </div>
            </div>
        </div>
        
        <!-- Right Panel (Forms) -->
        <div class="bg-white p-8 sm:p-10 flex flex-col">
            <!-- Toggle Buttons -->
            <div class="flex justify-center mb-10">
                <div class="toggle-btn">
                    <div id="toggle-slider" class="toggle-slider signup"></div>
                    <div id="login-option" class="toggle-option">Sign In</div>
                    <div id="signup-option" class="toggle-option active-option">Sign Up</div>
                </div>
            </div>
            
            <!-- Login Form Content -->
            <div id="login-form" class="form-container hidden flex-grow flex flex-col justify-center">
                <h1 class="text-2xl font-bold text-center mb-2">Welcome back</h1>
                <p class="text-gray-500 text-center mb-8">Sign in to access your dashboard</p>
                
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" placeholder="your@email.com"
                            class="input-field w-full px-4 py-3 @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}" required autofocus>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">Forgot password?</a>
                            @endif
                        </div>
                        <input type="password" id="password" name="password" placeholder="••••••••"
                            class="input-field w-full px-4 py-3 @error('password') border-red-500 @enderror" required>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">{{ __('Remember me') }}</label>
                    </div>
                    
                    <button type="submit" class="submit-btn text-white rounded-lg py-3 px-4 w-full text-center font-medium">
                        Sign In
                    </button>
                    
                    {{-- <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" class="social-btn rounded-lg py-2 px-4 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="mr-2">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Google
                        </button>
                        
                        <button type="button" class="social-btn rounded-lg py-2 px-4 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#1877F2" class="mr-2">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                            Facebook
                        </button>
                    </div> --}}
                </form>
                
                <div class="text-center mt-8 text-sm text-gray-600">
                    Don't have an account? 
                    <button type="button" class="text-indigo-600 font-medium hover:underline" id="switch-to-signup-text">Sign up</button>
                </div>
            </div>
            
            <!-- Register Form Content -->
            <div id="signup-form" class="form-container visible flex-grow flex flex-col justify-center">
                <h1 class="text-2xl font-bold text-center mb-2">Create your account</h1>
                <p class="text-gray-500 text-center mb-8">Get started with our platform today</p>
                
                <form method="POST" action="{{ route('register') }}" class="space-y-5" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="John Doe" 
                            class="input-field w-full px-4 py-3 @error('name') border-red-500 @enderror" 
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="register-email" name="email" placeholder="your@email.com" 
                            class="input-field w-full px-4 py-3 @error('email') border-red-500 @enderror" 
                            value="{{ old('email') }}" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="register-password" name="password" placeholder="••••••••" 
                            class="input-field w-full px-4 py-3 @error('password') border-red-500 @enderror" required>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                            placeholder="••••••••" class="input-field w-full px-4 py-3" required>
                    </div>

                    <div>
                        <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" 
                            class="input-field w-full px-4 py-3 @error('profile_image') border-red-500 @enderror" 
                            value="{{ old('profile_image') }}" required>
                        @error('profile_image')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-start">
                        <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded mt-1" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-indigo-600 hover:underline">Terms of Service</a> and <a href="#" class="text-indigo-600 hover:underline">Privacy Policy</a>
                        </label>
                    </div>
                    
                    <button type="submit" class="submit-btn text-white rounded-lg py-3 px-4 w-full text-center font-medium">
                        Create Account
                    </button>
                    
                    {{-- <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or sign up with</span>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" class="social-btn rounded-lg py-2 px-4 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" class="mr-2">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Google
                        </button>
                        
                        <button type="button" class="social-btn rounded-lg py-2 px-4 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#1877F2" class="mr-2">
                                <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                            </svg>
                            Facebook
                        </button>
                    </div> --}}
                </form>
                
                <div class="text-center mt-8 text-sm text-gray-600">
                    Already have an account?
                    <button type="button" class="text-indigo-600 font-medium hover:underline" id="switch-to-login-text">Sign in</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginOption = document.getElementById('login-option');
            const signupOption = document.getElementById('signup-option');
            const toggleSlider = document.getElementById('toggle-slider');
            const switchToSignupText = document.getElementById('switch-to-signup-text');
            const switchToLoginText = document.getElementById('switch-to-login-text');
            const loginForm = document.getElementById('login-form');
            const signupForm = document.getElementById('signup-form');

            // Function to switch to login form
            function showLoginForm() {
                toggleSlider.classList.remove('signup');
                toggleSlider.classList.add('login');
                loginOption.classList.add('active-option');
                signupOption.classList.remove('active-option');
                
                loginForm.classList.remove('hidden');
                loginForm.classList.add('visible');
                signupForm.classList.remove('visible');
                signupForm.classList.add('hidden');
            }

            // Function to switch to signup form
            function showSignupForm() {
                toggleSlider.classList.remove('login');
                toggleSlider.classList.add('signup');
                loginOption.classList.remove('active-option');
                signupOption.classList.add('active-option');
                
                loginForm.classList.remove('visible');
                loginForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
                signupForm.classList.add('visible');
            }

            // Event listeners
            loginOption.addEventListener('click', showLoginForm);
            signupOption.addEventListener('click', showSignupForm);
            switchToSignupText.addEventListener('click', showSignupForm);
            switchToLoginText.addEventListener('click', showLoginForm);
        });
    </script>
</body>
</html>