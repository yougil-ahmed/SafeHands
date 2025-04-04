<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
        
        .text-info {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 20px;
            line-height: 1.5;
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
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3b82f6;
            text-decoration: none;
            font-size: 14px;
        }
        
        .back-link:hover {
            text-decoration: underline;
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
        
        <div class="text-info">
            Forgot your password? No problem. Just let us know your email address and we'll email you a password reset link.
        </div>
        
        <!-- Session Status -->
        <div class="text-success">
            <!-- This will display any session status messages -->
            @if(session('status'))
                {{ session('status') }}
            @endif
        </div>
        
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <!-- Email Address -->
            <div>
                <label for="email" style="display: block; font-weight: 500; color: #374151; margin-bottom: 4px;">
                    Email
                </label>
                <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autofocus>
                
                @error('email')
                    <div class="text-error">{{ $message }}</div>
                @enderror
            </div>
            
            <div style="margin-top: 24px;">
                <button type="submit" class="btn-primary">
                    Email Password Reset Link
                </button>
            </div>
        </form>
        
        <a href="{{ route('login') }}" class="back-link">
            Back to login
        </a>
    </div>
</body>
</html>