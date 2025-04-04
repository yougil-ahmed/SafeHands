@props(['errors' => null, 'success' => null])

<style>
    /* Base Flash Message Styles */
    .flash-message {
        position: relative;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        margin-bottom: 1.5rem;
        padding: 1rem;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Error Message Specific Styles */
    .flash-message.error {
        background: linear-gradient(135deg, #fff5f5 0%, #fef2f2 100%);
        border-left: 5px solid #ef4444;
    }

    .flash-message.error .icon {
        color: #ef4444;
    }

    .flash-message.error h3 {
        color: #991b1b;
    }

    .flash-message.error .content {
        color: #b91c1c;
    }

    /* Success Message Specific Styles */
    .flash-message.success {
        background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);
        border-left: 5px solid #10b981;
    }

    .flash-message.success .icon {
        color: #10b981;
    }

    .flash-message.success h3 {
        color: #166534;
    }

    .flash-message.success .content {
        color: #047857;
    }

    /* Animations */
    @keyframes slideInDown {
        from { 
            opacity: 0;
            transform: translateY(-30px);
        }
        to { 
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideOutUp {
        from { 
            opacity: 1;
            transform: translateY(0);
        }
        to { 
            opacity: 0;
            transform: translateY(-30px);
        }
    }

    .flash-message {
        animation: slideInDown 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
    }

    .flash-message.fade-out {
        animation: slideOutUp 0.4s cubic-bezier(0.55, 0.085, 0.68, 0.53) forwards;
    }

    /* Close Button */
    .flash-close-btn {
        position: absolute;
        top: 0.75rem;
        right: 0.75rem;
        background: transparent;
        border-radius: 9999px;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        color: inherit;
        opacity: 0.6;
        transition: all 0.2s ease;
        z-index: 10;
    }

    .flash-close-btn:hover {
        opacity: 1;
        background-color: rgba(0, 0, 0, 0.05);
        transform: scale(1.1);
    }
    
    /* Content Styling */
    .flash-content {
        display: flex;
        align-items: flex-start;
        padding-right: 20px;
    }
    
    .flash-icon {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 9999px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    
    .flash-text {
        margin-left: 1rem;
        flex-grow: 1;
    }
    
    .flash-title {
        font-weight: 900;
        font-size: medium;
        margin-bottom: 0.25rem;
    }

    .content{
        font-weight: 700;
        font-size: small;
    }
    
    .flash-message ul {
        list-style-type: none;
        padding-left: 0;
        margin-top: 0.5rem;
    }
    
    .flash-message li {
        position: relative;
        padding-left: 1.25rem;
        margin-bottom: 0.375rem;
    }
    
    .flash-message li:before {
        content: "•";
        position: absolute;
        left: 0.25rem;
        top: 0;
    }
</style>

<!-- Error Message -->
@if($errors && $errors->any())
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        class="flash-message error"
    >
        <button type="button" class="flash-close-btn" @click="show = false" aria-label="Close">
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
        <div class="flash-content">
            <div class="flash-icon icon">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flash-text">
                <h3 class="flash-title">
                    There {{ $errors->count() > 1 ? 'were' : 'was' }} {{ $errors->count() }} {{ $errors->count() > 1 ? 'errors' : 'error' }} with your submission
                </h3>
                <div class="content">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif

<!-- Success Message -->
@if($success)
    <div 
        x-data="{ show: true }" 
        x-show="show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        x-init="setTimeout(() => show = false, 5000)"
        class="flash-message success"
    >
        <button type="button" class="flash-close-btn" @click="show = false" aria-label="Close">
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
        <div class="flash-content">
            <div class="flash-icon icon">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="flash-text">
                <h3 class="flash-title">
                    Success!
                </h3>
                <div class="content">
                    {{ $success }}
                </div>
            </div>
        </div>
    </div>
@endif

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>