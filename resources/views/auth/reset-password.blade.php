{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0a0a;
            position: relative;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background-image: url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(8px) brightness(0.7);
            z-index: -1;
        }
        
        .card-container {
            background-color: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            padding: 40px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-text {
            font-size: 24px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .logo-text span:first-child {
            color: #141E30;
        }
        
        .logo-text span:last-child {
            color: #3b82f6;
        }
        
        .input-field {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            margin-top: 6px;
        }
        
        .input-field:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
        }
        
        .text-error {
            color: #ef4444;
            font-size: 14px;
            margin-top: 4px;
        }
        
        .text-success {
            color: #10b981;
            font-size: 14px;
            margin-bottom: 16px;
        }
        
        .form-title {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .password-strength {
            margin-top: 8px;
            height: 4px;
            background-color: #e5e7eb;
            border-radius: 2px;
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0%;
            background-color: #10b981;
            transition: width 0.3s;
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }
        
        .input-wrapper {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="logo">
            <div class="logo-text">
                <span>S</span><span>ervicePro</span>
            </div>
        </div>
        
        <h2 class="form-title">Reset Your Password</h2>
        
        <!-- Session Status -->
        <div class="text-success">
            @if(session('status'))
                {{ session('status') }}
            @endif
        </div>
        
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <!-- Email Address -->
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; font-weight: 500; color: #374151; margin-bottom: 4px;">
                    Email
                </label>
                <input id="email" class="input-field" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                
                @error('email')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Password -->
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; font-weight: 500; color: #374151; margin-bottom: 4px;">
                    New Password
                </label>
                <div class="input-wrapper">
                    <input id="password" class="input-field" type="password" name="password" required autocomplete="new-password">
                    <span class="password-toggle" onclick="togglePassword('password')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
                </div>
                <div class="password-strength">
                    <div class="password-strength-bar" id="password-strength-bar"></div>
                </div>
                @error('password')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Confirm Password -->
            <div style="margin-bottom: 24px;">
                <label for="password_confirmation" style="display: block; font-weight: 500; color: #374151; margin-bottom: 4px;">
                    Confirm New Password
                </label>
                <div class="input-wrapper">
                    <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password">
                    <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
                </div>
                @error('password_confirmation')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div>
                <button type="submit" class="btn-primary">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const toggleIcon = field.nextElementSibling.querySelector('svg');
            
            if (field.type === 'password') {
                field.type = 'text';
                toggleIcon.setAttribute('data-icon', 'eye-slash');
            } else {
                field.type = 'password';
                toggleIcon.setAttribute('data-icon', 'eye');
            }
        }
        
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('password-strength-bar');
            let strength = 0;
            
            // Check for length
            if (password.length > 7) strength += 25;
            
            // Check for lowercase
            if (password.match(/[a-z]/)) strength += 25;
            
            // Check for uppercase
            if (password.match(/[A-Z]/)) strength += 25;
            
            // Check for numbers and special chars
            if (password.match(/[0-9!@#$%^&*]/)) strength += 25;
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            strengthBar.style.backgroundColor = 
                strength < 50 ? '#ef4444' : 
                strength < 75 ? '#f59e0b' : '#10b981';
        });
    </script>
</body>
</html>
